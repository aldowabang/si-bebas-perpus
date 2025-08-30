<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Models\Student;
use App\Models\BebasPerpus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSkripsiRequest;
use App\Http\Requests\StoreBebasPerpusRequest;
use App\Http\Requests\UpdateBebasPerpusRequest;
use GuzzleHttp\Psr7\Request;

class BebasPerpusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dashboard view
        $students = Student::with(['bebasPerpus', 'skripsi'])->orderBy('name', 'asc')->get();

        $data = [
            'title' => 'Dashboard',
            'description' => 'Halaman ini menampilkan ringkasan data bebas perpus.',
            'breadcrumbs' => [
                ['label' => 'Dashboard', 'url' => route('dashboard')],
            ],
            'bebasPerpus' => $students,

        ];
        return view('admin.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = collect([
            (object) ['name' => 'Sistem Informasi', 'code' => 'SI'],
            (object) ['name' => 'Sistem Komputer', 'code' => 'SK'],
            (object) ['name' => 'Hukum', 'code' => 'HKM'],
            (object) ['name' => 'Matematika', 'code' => 'MK'],
            (object) ['name' => 'Rekayasa Perangkat Lunak', 'code' => 'RPL'],
            (object) ['name' => 'Biologi', 'code' => 'BLG'],
            (object) ['name' => 'Management', 'code' => 'MGMT'],
        ]);

        
        $data = [
            'title' => 'Tambah Data Bebas Perpus',
            'description' => 'Halaman ini digunakan untuk menambahkan data bebas perpus baru.',
            'breadcrumbs' => [
                ['label' => 'Data Bebas Pustaka', 'url' => route('Data-Bebas-Perpus')],
                ['label' => 'Tambah Data', 'url' => route('Bebas-Perpus-create')],
            ],
            'departments' => $department,
        ];

        return view('admin.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBebasPerpusRequest $request)
    {
        $request->validated();
        $student = Student::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'department' => $request->department,
        ]);

        return redirect()->route('skripsi-create', $student->id)->with('success', 'Data student berhasil ditambahkan, silakan isi data skripsi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BebasPerpus $bebasPerpus)
    {
             // Fetch all bebas perpus records
        $students = Student::with(['bebasPerpus', 'skripsi'])->orderBy('name', 'asc')->get();


        
        $data = [
            'title' => 'Data Bebas Perpus',
            'description' => 'Halaman ini menampilkan data bebas perpus yang telah diajukan oleh pengguna.',
            'breadcrumbs' => [
                ['label' => 'Data Bebas Pustaka', 'url' => route('Data-Bebas-Perpus')],
            ],
            'bebasPerpus' => $students,
        ];

        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new Skripsi.
     */
    public function createSkripsi($id)
    {
        $jalurLulus = collect([
            (object) ['name' => 'JALUR IMPLEMENTASI', 'code' => 'IMP'],
            (object) ['name' => 'JALUR JURNAL', 'code' => 'JJ'],
            (object) ['name' => 'JALUR MKBM', 'code' => 'JM'],
            (object) ['name' => 'JALUR REGULER', 'code' => 'JR'],
            (object) ['name' => 'JALUR KERJA PRESTASI', 'code' => 'JP'],
        ]);

        $student = Student::findOrFail($id);
        $skripsi = Skripsi::where('student_id', $id)->first();
        $data = [
            'title' => 'Tambah Data Skripsi',
            'description' => 'Halaman ini digunakan untuk menambahkan data skripsi baru.',
            'breadcrumbs' => [
                ['label' => 'Data Bebas Pustaka', 'url' => route('Data-Bebas-Perpus')],
                ['label' => 'Data Skripsi', 'url' => route('skripsi-create', $student->id)],

            ],
            'student' => $student,
            'skripsi' => $skripsi,
            'jalurLulus' => $jalurLulus,
        ];
        return view('admin.create-skripsi', $data);
    }

    public function storeSkripsi(StoreSkripsiRequest $request, $id)
    {
        $request->validated();

        $skripsi = Skripsi::create([
            'student_id' => $id,
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'jalur_lulus' => $request->jalur_lulus,
            'catatan' => $request->catatan,
        ]);
        $skripsi->save();

        // Check if skripsi was created successfully
        if (!$skripsi) {
            return redirect()->back()->with('error', 'Gagal menambahkan data skripsi.');
        }

        // Update status bebasPerpus
        $student = Student::findOrFail($id);
        $student->bebasPerpus()->updateOrCreate(
            ['student_id' => $id, 'skripsi_id' => $skripsi->id],
            ['status' => 'approved', 'catatan_admin' => 'Data skripsi telah ditambahkan.', 'tanggal_terbit' => now()]
        );

        return redirect()->route('skripsi-create', $student->id)->with('success', 'Data skripsi berhasil ditambahkan.');
    }

    public function cetak($id)
    {
        $fileName = now()->format('Y-m-d') . '-bebas-perpus-';
        $student = Student::with(['bebasPerpus', 'skripsi'])->findOrFail($id);

         // data skripsi (ambil 1 saja, kalau ada lebih pilih yang terbaru)
        $skripsi = DB::table('skripsis')
            ->where('student_id', $id)
            ->orderBy('id', 'desc')
            ->first();

        // data bebas perpus (ambil 1 saja)
        $bebasPerpus = DB::table('bebas_perpuses')
            ->where('student_id', $id)
            ->orderBy('id', 'desc')
            ->first();

        $data = [
            'title' => 'Laporan Bebas Perpus',
            'description' => 'Laporan bebas perpus untuk ' . $student->name,
            'student' => $student,
            'bebasPerpus' => $bebasPerpus,
            'skripsi1' => $skripsi,
            'tanggal_terbit' => now()->format('d-m-Y'),
        ];
        $pdf = Pdf::loadView('admin.cetak', $data)->setPaper('A4', 'portrait')
            ->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('laporan-bebas-perpus-' . $fileName . '.pdf');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BebasPerpus $bebasPerpus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBebasPerpusRequest $request, BebasPerpus $bebasPerpus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BebasPerpus $bebasPerpus)
    {
        //
    }

    public function login(Request $request)
    {
        @dd($request);
    }
}
