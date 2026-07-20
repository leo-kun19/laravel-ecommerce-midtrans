@extends('layouts.layouts-landing')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                Tentang <span class="text-green-600">Ruang Pemuda</span>
            </h1>
            <div class="mt-4 h-1 w-24 bg-green-500 mx-auto rounded-full"></div>
        </div>

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden p-8 md:p-12 border border-gray-100">
            <div class="prose prose-lg text-gray-700 leading-relaxed text-justify space-y-6">
                <p>
                    Kebutuhan akan solusi digital ini terlihat secara nyata pada platform Ruang Pemuda, sebuah inisiatif
                    kolaboratif di bawah naungan <strong>Dinas Kepemudaan dan Olahraga (Dispora) Kota Semarang</strong>. 
                    Meskipun telah berfungsi sebagai pusat informasi, platform ini menghadapi problematika mendesak berupa 
                    keterbatasan kapabilitas di sektor ekonomi digital.
                </p>

                <p>
                    Masalah krusial yang diidentifikasi adalah sulitnya akses pasar bagi produk kreatif yang dihasilkan oleh 
                    berbagai komunitas kepemudaan di Semarang. Sebagai langkah solutif, diperlukan pengembangan sistem 
                    e-commerce di dalam website Ruang Pemuda. Pengembangan ini dirancang sebagai medium untuk menjembatani 
                    hambatan pemasaran yang dihadapi pelaku usaha muda melalui antarmuka yang responsif dan aksesibel.
                </p>

                <div class="bg-green-50 border-l-4 border-green-500 p-6 my-8">
                    <p class="italic text-green-800 m-0">
                        "Penelitian melalui kegiatan magang ini berfokus pada implementasi solusi teknis berupa modul 
                        community-centric e-commerce."
                    </p>
                </div>

                <p>
                    Solusi ini diwujudkan melalui proses pengembangan yang sistematis, mencakup perancangan antarmuka 
                    marketplace, pembangunan fitur transaksi multi-pihak, hingga integrasi basis data produk komunitas 
                    yang terpusat. Dengan menggunakan <strong>Laravel</strong>, penulis merumuskan solusi atas kebutuhan 
                    fungsionalitas platform yang mampu memfasilitasi identitas bersama serta memperkuat nilai kolaboratif 
                    antar komunitas kreatif di bawah pengawasan Dispora Kota Semarang.
                </p>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 transition">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection