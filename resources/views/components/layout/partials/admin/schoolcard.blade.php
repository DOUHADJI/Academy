<a href="{{ route("showSchool", $school->sigle) }}">
    <div class="grid justify-center items-center gap-4 bg-yellow-100 shadow  text-gray-500  py-12 px-12 rounded-lg w-full h-full">
        <div class="flex gap-4 items-end justify-center">
            <i class="fa fa-building text-5xl"></i>
            <p class="text-2xl font-black "> 
                <span>
                    {{ $school -> sigle }} 
                </span>
            </p>
            
        </div>          
        <span class="text-center underline ">{{ $school -> nom }}</span>
        <span class="text-center italic">{{ $school -> grades_disponibles }}</span>
    </div>
</a>