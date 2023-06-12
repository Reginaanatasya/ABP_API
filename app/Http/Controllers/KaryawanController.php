<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
  public function show($nik)
  {
      $karyawan = Karyawan::where('nik', $nik)->first();

      if ($karyawan) {
          return response()->json(['data' => $karyawan], 200);
      }

      return response()->json(['message' => 'Karyawan not found'], 404);
  }
}