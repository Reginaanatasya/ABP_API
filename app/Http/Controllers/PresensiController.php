<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Presensi;
use Carbon\Carbon;
 
class PresensiController extends Controller
  {
    public function absenMasuk(Request $request)
    {
        $nik = (string)$request->input('nik');
        $lokasi_in = (string)$request->input('lokasi_in');
 
        // Set the tgl_presensi to the current date
        $tgl_presensi = Carbon::today();
 
        // Set the jam_in to the current time
        $jam_in = Carbon::now()->addHours(7)->format('H:i:s');
 
        // Create a new Presensi record
        $presensi = Presensi::create([
            'nik' => $nik,
            'tgl_presensi' => $tgl_presensi,
            'jam_in' => $jam_in,
            'lokasi_in' => $lokasi_in,
        ]);
 
        // Return a response indicating success
        return response()->json(['message' => 'Presensi created successfully'], 201);
    }
 
    public function index($nik)
    {
        $presensi = Presensi::where('nik', $nik)->get();
 
        if ($presensi->count() > 0) {
            return response()->json(['data' => $presensi], 200);
        }
 
        return response()->json(['message' => 'Presensi not found for the given nik'], 404);
    }
 
 
    public function absenKeluar(Request $request)
    {
      $nik = (string) $request->input('nik');
      $lokasi_out = (string) $request->input('lokasi_out');

      // Set the tgl_presensi to the current date
      $tgl_presensi = Carbon::today();

      // Set the jam_in to the current time
      $jam_in = Carbon::now()->addHours(7)->format('H:i:s');

      // Find the Presensi record for the current date
      //   $presensi = Presensi::where('tgl_presensi', $tgl_presensi)
      //       ->where('nik', $nik)
      //       ->first();

        $presensi = Presensi::where('tgl_presensi', $tgl_presensi)
        ->where('nik', $nik)
        ->update([
            'lokasi_out' => $lokasi_out,
            'jam_out' => Carbon::now()->addHours(7)->format('H:i:s')
        ]);

      if ($presensi > 0) {
          // Update successful, return a response indicating success
          return response()->json(['message' => 'Absen keluar berhasil'], 201);
      } else {
          // No matching Presensi records found, return an appropriate response
          return response()->json(['message' => 'Presensi not found for the given nik'], 404);
      }

      // Return a response indicating success
      return response()->json(['message' => 'Absen keluar berhasil'], 201);
    }
 
 
  }