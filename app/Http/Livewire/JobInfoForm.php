<?php


namespace App\Http\Livewire;


use App\Models\JobArticle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobInfoForm extends Component
{
    public $action;
    public $job;
    public $dataId;
    public $file;


    public function render()
    {
        return view('livewire.job-info-form');
    }

    public function mount ()
    {
        $this->job['detail_info']='';
        if (!!$this->dataId) {
            $job = JobArticle::findOrFail($this->dataId);

            $this->job = [
                "title" => $job->title,
                "company" => $job->company,
                "deadline" => $job->deadline,
                "link_info" => $job->link_info,
                "detail_info" => $job->detail_info,
                "thumbnail" => $job->thumbnail,
            ];
        }
    }

    public function create()
    {
//        $this->job['slug']=Str::slug($this->blog['title']);
//        $this->data['user_id']=Auth::id();
//        Auth itu mengambil semua data yang aktif
//        $this->data['map_picture'] = md5($this->data['village']).'.'.$this->file->getClientOriginalExtension();
//        $this->file->storeAs('public/map', $this->data['map_picture']);
//        unset($this->data['thumbnail_photo']);
//        $this->job['user_id'] = Auth::user()->id;
        JobArticle::create($this->job);

        $this->reset('job');
        $this->job['detail_info']='';
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('reset');
    }

    public function getRules(){
        if ($this->action=="create"){
            $rules=[
                'job.title' => ' required|max:256',
                'job.company' => 'required',
                'job.deadline' => 'required',
                'job.link_info' => 'required',
                'job.detail_info' => 'required',
                'job.thumbnail' => 'required'
            ];
        }else{
            $rules=[
                'job.title' => ' required|max:256',
                'job.company' => 'required',
                'job.deadline' => 'required',
                'job.link_info' => 'required',
                'job.detail_info' => 'required',
                'job.thumbnail' => 'required'
            ];
        }
        return $rules;
    }

    public function update() {
//        $this->resetErrorBag();
//        $this->validate();


//        $this->blog['map_picture'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
//        if ($this->file !=null){
//            $this->file->storeAs('public/map/', $this->blog['map_picture']);
//        }
//        dd($this->blogId);

        JobArticle::find($this->dataId)->update($this->job);

//        dd($bro);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }
}
