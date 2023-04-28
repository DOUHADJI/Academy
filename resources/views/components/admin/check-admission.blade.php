@php
$student = $admission->student->infos;
@endphp

<div class="grid ">
    <x-layout.partials.student-infos :student="$student" />

    <div class="elevation-2 p-12 my-6 bg-whiteS">
        <p class="text-lg font-bold my-4 text-center">
            Fichiers joints
        </p>

        <div class=" flex flex-wrap justify-around my-4">
            @php
            $files = [
            [
            "title" => asset(Storage::url($admission->cv)),
            "name" => "cv"
            ],
            [
            "title" => asset(Storage::url($admission->lettre_motivation)),
            "name" => "lettre de motivation"
            ],
            [
            "title" => asset(Storage::url($admission->releve_bac_1)),
            "name" => "releve bac 1"
            ],
            [
            "title" => asset(Storage::url($admission->releve_bac_2)),
            "name" => "releve bac 2"
            ],

            [
            "title" => asset(Storage::url($admission->releve_bepc)),
            "name" => "releve bac bepc"
            ]
            ]
            @endphp

            @foreach ($files as $file )
            <a href="{{ $file["title"] }}" class="btn btn-lg btn-primary " target="blank" type="application/pdf">
                <i class="fa fa-print mr-2"></i>
                {{ $file["name"] }}
            </a>
            @endforeach





            {{-- <iframe 
                src="{{ Storage::url($admission->cv)}}#toolbar=0&navpanes=0"
            frameborder="0"
            width="100%"
            height="600px"
            class="bg-white my-4"
            >
            </iframe>
            --}}

        </div>
    </div>



    @if(Auth::user() -> role =="admin")

    <div class="flex gap-6 w-full justify-end mt-8">
        <div>
            <form action="{{ route("treatAdmission",[
                        "admissionId" => $admission -> id
                    ]) }}" method="POST">
                @csrf
                <input type="text" name="decision" value="accepted" hidden>
                <button href="{{ route('updateStudent') }}" class="btn btn-lg btn-success">
                    Accepter
                </button>
            </form>
        </div>

        <div>
            <form action="{{ route("treatAdmission",[
                        "admissionId" => $admission -> id
                    ]) }}" method="POST">
                @csrf
                <input type="text" name="decision" value="refused" hidden>
                <button href="{{ route('updateStudent') }}" class="btn btn-lg btn-danger">
                    Refuser
                </button>
            </form>
        </div>
    </div>


    @endif
</div>
