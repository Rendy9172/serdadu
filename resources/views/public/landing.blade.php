﻿@extends('layouts.dukcapil', ['title' => 'Beranda'])

@section('content')
    @if (!$period)
        <div class="alert alert-warning border-0 dk-card">
            <strong>Data belum tersedia.</strong> Silakan unggah dataset terlebih dahulu melalui halaman admin.
        </div>
    @else
        <div class="row g-4">
            <div class="col-xl-4">
                <div class="dk-card h-100">
                    <div class="card-body p-4">
                        <h6 class="dk-card__title mb-3">Data Agregat Kependudukan</h6>
                        <div class="mb-4">
                            <h6 class="text-uppercase text-xs text-muted mb-2">Wilayah</h6>
                            <div class="table-responsive">
                                <table class="table table-sm dk-table mb-3">
                                    <tbody>
                                        <tr>
                                            <td class="fw-semibold">Nama Wilayah</td>
                                            <td class="text-end">Kabupaten Madiun</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Jumlah Kecamatan</td>
                                            <td class="text-end">{{ number_format($districtCount) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-semibold">Jumlah Desa/Kel</td>
                                            <td class="text-end">{{ number_format($villageCount) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-uppercase text-xs text-muted mb-2">Jumlah Penduduk</h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="p-3 rounded-3 dk-metric--light">
                                        <div class="dk-metric__label text-white-50">Total Penduduk</div>
                                        <div class="dk-metric text-white">{{ number_format($totals['population']) }}</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <div class="dk-metric__label">Laki-laki</div>
                                        <div class="dk-metric" style="font-size: 1.2rem;">
                                            {{ number_format($totals['male']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="bg-light rounded-3 p-3">
                                        <div class="dk-metric__label">Perempuan</div>
                                        <div class="dk-metric" style="font-size: 1.2rem;">
                                            {{ number_format($totals['female']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-light rounded-3 p-3">
                                        <div class="dk-metric__label">Wajib KTP (≥ 17 tahun)</div>
                                        <div class="dk-metric" style="font-size: 1.2rem;">
                                            {{ number_format($wajibKtp['total']) }}
                                        </div>
                                        <small class="text-muted d-block">
                                            L: {{ number_format($wajibKtp['male']) }} ·
                                            P: {{ number_format($wajibKtp['female']) }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="dk-card h-100">
                    <div class="card-body p-0">
                        <div class="p-4 pb-0">
                            <h6 class="dk-card__title mb-2">Peta Kabupaten Madiun</h6>
                        </div>
                        <div class="p-4 pt-0">
                            <div class="ratio ratio-16x9 dk-map">
                                <iframe
                                    src="https://maps.google.com/maps?q=Kabupaten%20Madiun%2C%20Jawa%20Timur&t=&z=10&ie=UTF8&iwloc=&output=embed"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                    style="border:0;" title="Peta Kabupaten Madiun"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
