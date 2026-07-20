<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentNotificationController extends Controller
{
    public function __construct()
    {
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = config('midtrans.is_sanitized');
            Config::$is3ds = config('midtrans.enable_3ds');
        } catch (Exception $e) {
            Log::error('Midtrans Config error: ' . $e->getMessage());
        }
    }

    public function handle(Request $request)
    {
        try {
            $notif = new Notification();
        } catch (Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage());
            return response()->json(['message' => 'Notification Error'], 500);
        }

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;

        // Cari order berdasarkan ID
        $order = Order::find($orderId);

        if (!$order) {
            Log::error("Order ID $orderId not found for payment notification.");
            return response()->json(['message' => 'Order not found'], 404);
        }

        DB::beginTransaction();
        try {
            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $order->update(['status' => 'pending']);
                    } else {
                        $order->update(['status' => 'paid']);
                    }
                }
            } else if ($transaction == 'settlement') {
                $order->update(['status' => 'paid']);
            } else if ($transaction == 'pending') {
                $order->update(['status' => 'pending']);
            } else if ($transaction == 'deny') {
                $order->update(['status' => 'cancelled']);
            } else if ($transaction == 'expire') {
                $order->update(['status' => 'cancelled']);
            } else if ($transaction == 'cancel') {
                $order->update(['status' => 'cancelled']);
            }

            // Simpan detail tambahan jika perlu
            $order->update([
                'midtrans_transaction_id' => $notif->transaction_id,
                'midtrans_payment_type' => $type,
            ]);

            DB::commit();
            
            // Kirim respons OK ke Midtrans
            return response()->json(['status' => 'success']);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Error updating order status: " . $e->getMessage());
            return response()->json(['message' => 'Error updating status'], 500);
        }
    }
}
