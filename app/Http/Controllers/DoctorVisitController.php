<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Medicine;
use App\Models\Admission;
use App\Models\DoctorVisit;
use Illuminate\Http\Request;

class DoctorVisitController extends Controller
{
    public function index()
    {
        $searchTerm = '';
        // Retrieve all doctor visits (or paginate them)
        $doctorVisits = DoctorVisit::with('patient', 'doctor')->get();

        return view('dashboard.doctor_visits.index', compact('doctorVisits', 'searchTerm'));
    }

    public function create()
    {
        $admissions = Admission::with('patient')->get();
        $doctors = Doctor::all();
        $medicines = Medicine::all();
        $services = Service::all();

        return view('dashboard.doctor_visits.store', compact('admissions', 'doctors', 'medicines', 'services'));
    }

public function store(Request $request)
{
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'patient_id' => 'required|exists:patients,id',
        'visit_date' => 'required',
        'type' => 'required|in:medicine,service',
        'prescription_details' => 'required',
    ]);

    DoctorVisit::create([
        'inpatient_id' => $request->patient_id,
        'doctor_id' => $request->doctor_id,
        'visit_date' => $request->visit_date,
        'type' => $request->type,
        'prescription_details' => $request->prescription_details,
    ]);

    return redirect()->route('dashboard.doctor.visits.index')->with('success', 'Doctor visit recorded successfully.');
}

        public function prescription($id)
        {
            $doctorVisit = DoctorVisit::with('admission', 'doctor')->findOrFail($id);
            $patient = Patient::findOrFail($doctorVisit->inpatient_id);

            // Fetch data for the prescription
            $data = [
                'admission' => $doctorVisit->admission,
                'doctor' => $doctorVisit->doctor,
                'patient' => $patient,
                'visit_date' => $doctorVisit->visit_date,
                'type' => ucfirst($doctorVisit->type),
                'prescription_details' => $doctorVisit->prescription_details,
            ];

            // Load the view and render it as a PDF
            $pdf = Pdf::loadView('dashboard.prescription', $data);


            // Return the PDF as a downloadable response
            return $pdf->download('prescription.pdf');
        }

    }
