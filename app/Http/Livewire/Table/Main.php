<?php

namespace App\Http\Livewire\Table;

use App\Models\Interview;
use App\Models\InterviewDetail;
use App\Models\InterviewScore;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item", "verifyItem" => "verification_item", "verifySchedule" => "verification_schedule", "chooseInterview" => "choose_interview"];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
//                    dd($users);
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.user.create'),
                            'create_new_text' => 'Buat User Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'user-hrd':
                $users = $this->model::searchHrd($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.user-hrd.create'),
//                            'create_new_text' => 'Buat HRD Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'user-regular':
                $users = $this->model::searchRegular($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user-regular',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.user-regular.create'),
//                            'create_new_text' => 'Buat Regular Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'user-premium':
                $users = $this->model::searchPremium($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user-premium',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.user-premium.create'),
//                            'create_new_text' => 'Buat Premium Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'question-detail':
                $questions = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.question-detail',
                    "questions" => $questions,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.question-detail.create'),
                            'create_new_text' => 'Buat Soal Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'payment':
                if (Auth::user()->role==1) {
                $payments = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.payment',
                    "payments" => $payments,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.payment.create'),
//                            'create_new_text' => 'Tambah Pembayaran',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
                }else {
                    $payments = $this->model::searchUser($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.payment',
                        "payments" => $payments,
                        "data" => array_to_object([
                            'href' => [
//                            'create_new' => route('admin.payment.create'),
//                            'create_new_text' => 'Tambah Pembayaran',
                                'export' => '#' ,
                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }

            case 'payment-verification':
                $payments = $this->model::searchVerification($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.payment-verification',
                    "payments" => $payments,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.payment-choosen.create'),
//                            'create_new_text' => 'Tambah Pembayaran',
                            'export' => '#' ,
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'interview':
                if (Auth::user()->role==3) {
                $interviews = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                    return [
                        "view" => 'livewire.table.interview',
                        "interviews" => $interviews,
                        "data" => array_to_object([
                            'href' => [
//                                'create_new' => route('admin.interview.create'),
//                                'create_new_text' => 'Buat Interview Baru',
//                                'export' => '#',
//                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }else{
                    $interviews = $this->model::searchHrd($this->search)
                            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                            ->paginate($this->perPage);
                    return [
                        "view" => 'livewire.table.interview',
                        "interviews" => $interviews,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('admin.interview.create'),
                                'create_new_text' => 'Buat Interview Baru',
                                'export' => '#',
                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }



            case 'interview-choosen':
                $interviews = $this->model::searchChoosen($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.interview-choosen',
                    "interviews" => $interviews,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.interview-choosen.create'),
//                            'create_new_text' => 'Tambah Pembayaran',
                            'export' => '#' ,
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'interview-score':
                if (Auth::user()->role==1 or Auth::user()->role==2) {
                    $interviews = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.interview-score',
                        "interviews" => $interviews,
                        "data" => array_to_object([
                            'href' => [
//                            'create_new' => route('admin.interview-choosen.create'),
//                            'create_new_text' => 'Tambah Pembayaran',
//                            'export' => '#' ,
//                            'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }elseif (Auth::user()->role==3) {
                    $interviews = $this->model::searchPremium($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.interview-score',
                        "interviews" => $interviews,
                        "data" => array_to_object([
                            'href' => [
//                            'create_new' => route('admin.interview-choosen.create'),
//                            'create_new_text' => 'Tambah Pembayaran',
//                            'export' => '#' ,
//                            'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }



            case 'test':
                if (Auth::user()->role==1){
                    $tests = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.test',
                        "tests" => $tests,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('admin.test.create'),
                                'create_new_text' => 'Buat Tes Baru',
                                'export' => '#',
                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }elseif (Auth::user()->role==3) {
                    $tests = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.test',
                        "tests" => $tests,
                        "data" => array_to_object([
                            'href' => [
//                                'create_new' => route('admin.test.create'),
//                                'create_new_text' => 'Buat Tes Baru',
//                                'export' => '#',
//                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                } elseif (Auth::user()->role==4) {
                    $tests = $this->model::searchRegularTest($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.test',
                        "tests" => $tests,
                        "data" => array_to_object([
                            'href' => [
//                                'create_new' => route('admin.test.create'),
//                                'create_new_text' => 'Buat Tes Baru',
//                                'export' => '#',
//                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }


            case 'job-info':
                $jobs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
//                dd($jobs);

                return [
                    "view" => 'livewire.table.job-info',
                    "jobs" => $jobs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.job-info.create'),
                            'create_new_text' => 'Buat Info Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'score':
                if (Auth::user()->role==3 or Auth::user()->role==4) {
                    $score = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.question-score',
                        "score" => $score,
                        "data" => array_to_object([
                            'href' => [
//                            'create_new' => route('admin.job-info.create'),
//                            'create_new_text' => 'Buat Info Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }elseif (Auth::user()->role==1) {
                    $score = $this->model::searchAdmin($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.question-score',
                        "score" => $score,
                        "data" => array_to_object([
                            'href' => [
//                            'create_new' => route('admin.job-info.create'),
//                            'create_new_text' => 'Buat Info Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }

            default:
                # code...
                break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function verification_item($id){
//        dd($id);
//        dd($this->model);
        $data=$this->model::find($id);
//        dd($data->user_id);
        User::find($data->user_id)->update(['role'=>3]);

        $data = $this->model::whereId($id)->whereVerification('no')->update(['verification' => 'yes']);
//        dd($data);
//        $this->model::class

        if (!$data) {
            $this->emit("verifyResult", [
                "status" => false,
                "message" => "Gagal menemukan data " . $this->name
            ]);
            return;
        }


        $this->emit("verifyResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil diverifikasi!"
        ]);
    }

    public function verification_schedule($id){
//        dd($id);
//        dd($this->model);
        $data = $this->model::whereId($id)->whereVerification('no')->update(['choosen' => 'yes']);

        if (!$data) {
            $this->emit("verifyResult", [
                "status" => false,
                "message" => "Gagal menemukan data " . $this->name
            ]);
            return;
        }


        $this->emit("verifyResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil diverifikasi!"
        ]);
    }

    public function choose_interview($id){
//        dd($id);
//        dd($this->model);
        $date = Interview::whereId($id)->get('date');
        $time = Interview::whereId($id)->get('time');
        foreach ($date as $d){
        }
        foreach ($time as $t){
        }

        InterviewScore::create([
//            dd($d->date),
            'interview_id' => $id,
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'date' => $d->date,
            'time' => $t->time
        ]);

        $data = Interview::whereId($id)->whereUserId(NULL)->update(['user_id' => Auth::id()]);

        if (!$data) {
            $this->emit("verifyResult", [
                "status" => false,
                "message" => "Gagal menemukan data " . $this->name
            ]);
            return;
        }


        $this->emit("verifyResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil diverifikasi!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
