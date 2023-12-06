<?php


namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Branch;
use App\Models\Evaluation;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateMail;
use Illuminate\Support\Facades\Log;


class Pre_MembershipController extends Controller
{
    public function index(){
        $branches = Branch::all();

        return view('guest.premembershipform', compact('branches'));
    }


    public function premembershipForm(Request $request)
    {

        $data = $request->validate([
            'lname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255', //new
            'sex' => 'nullable|string|max:255',
            'civil_status' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'age' => 'nullable|integer', //new
            'tel_no' => 'nullable|string|max:255',
            'mobile_no' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',  //new
            'email' => 'nullable|email|max:255',
            'place_birth' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:255',
            'usercode' => 'nullable|string|size:8',
            'occupation' => 'nullable|string|max:255',
            'ofw_family_member' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric', //new
            'longitude' => 'nullable|numeric', //new

           
            // evaluation data
            'branches' => 'nullable|array',
            'q_one' => 'nullable|string',
            'q_two' => 'nullable|string',
            'q_three' => 'nullable|string',
            'q_four' => 'nullable|string',
            'q_five' => 'nullable|string',
            'q_six' => 'nullable|string',
            'q_seven' => 'nullable|string',
            'q_eight' => 'nullable|string',
            'q_nine' => 'nullable|string',
            'q_ten' => 'nullable|string',
            'score' => 'nullable|integer',
            'pass_status' => 'nullable|string'
        ]);

        // Generate random usercode if not provided in the request
        $data['usercode'] = $data['usercode'] ?? Str::random(8);
        $PrememberInfo = Member::create($data);

         // Get the ID of the newly created Personal_info record
         $PrememberInfoId = $PrememberInfo->id;

        
        // Create an evaluation for each selected branch
        foreach ($data['branches'] as $branchId) {
            $evaluationData = [
                'branch_id' => $branchId,
                'member_id' => $PrememberInfoId,
                'q_one' => $data['q_one'],
                'q_two' => $data['q_two'],
                'q_three' => $data['q_three'],
                'q_four' => $data['q_four'],
                'q_five' => $data['q_five'],
                'q_six' => $data['q_six'],
                'q_seven' => $data['q_seven'],
                'q_eight' => $data['q_eight'],
                'q_nine' => $data['q_nine'],
                'q_ten' => $data['q_ten'],
                'score' => 'nullable|integer',
                'pass_status' => 'nullable|string',
            ];
    
                
                $includedFields = ['q_one', 'q_two', 'q_three', 'q_four', 'q_five', 'q_six', 'q_seven', 'q_eight', 'q_nine', 'q_ten'];
                $submittedAnswers = $request->only($includedFields);
    
                $correctAnswers = [
                    'q_one' => '5',
                    'q_two' => 'Board of Directors',
                    'q_three' => '1978',
                    'q_four' => '1.50 % per annum',
                    'q_five' => 'Savings Deposit',
                    'q_six' => 'Voluntary and Open Membership',
                    'q_seven' => 'Yes',
                    'q_eight' => 'Regular Membership',
                    'q_nine' => 'Sunshine Damayan',
                    'q_ten' => 'Gcash',
                ];
    
    
                // Calculate the score and pass status for each evaluation
                $score = 0;
                foreach ($correctAnswers as $question => $correctAnswer) {
                    if (isset($submittedAnswers[$question]) && $submittedAnswers[$question] === $correctAnswer) {
                        $score++;
                    }
                }
            
                $totalPossibleScore = count($correctAnswers);
                $passingThreshold = 80;
            
                $percentageScore = ($score / $totalPossibleScore) * 100 + 10;
            
                $passOrFail = ($percentageScore >= $passingThreshold) ? 'Pass' : 'Fail';
    
                if ($passOrFail === 'Pass') {
                    $certificate_data = [
                        'fname' => $data['fname'],
                        'mname' => $data['mname'],
                        'lname' => $data['lname'],
                        'link' => 'http://127.0.0.1:8000/code',
                    ];
                    
                
                    try {
                        // $pdfPath = $this->certificatePDF($data);
                
                        Mail::to($data['email'])->send(new CertificateMail($certificate_data, $data['usercode']));
                
                        $PrememberInfo->update(['email_sent' => true]); // Update the email_sent flag to indicate the email has been sent
                    } catch (\Exception $e) {
                        Log::error("Failed to send email to {$data['email']}: " . $e->getMessage());
                    }
                }
            
                // Assign score and pass status to evaluation data
                $evaluationData['score'] = $percentageScore;
                $evaluationData['pass_status'] = $passOrFail;
            
                try {
                    Evaluation::create($evaluationData); //Save to the database
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }
    
            return view('guest.result', compact('percentageScore', 'passOrFail'));
        }

    }