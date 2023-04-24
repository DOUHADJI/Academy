@php
$student = $admission->student->infos;
@endphp

<div class="grid ">
    <x-layout.partials.student-infos :student="$student" />

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
