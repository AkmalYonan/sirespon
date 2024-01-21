<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index_laporan()
    {
        return view('pages.admin.laporan.index');
    }
    public function laporan_detail()
    {
        return view('pages.admin.laporan.detail');
    }
    public function index_pengaduan()
    {
        return view('pages.admin.pengaduan.index');
    }
}
