<div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($inscriptions as $inscription)
   <a  @if($inscription->exam) href="#" @else class="opacity-75"  @endif>
    <div class="info-box">
        <span class="info-box-icon bg-success"><i class="fa fa-file-alt"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">code - UE : {{ $inscription->offer->code }}</span>
          <span class="info-box-text">nature : {{ $inscription->offer->nature }}</span>
          <span class="info-box-number">Crédit : {{ $inscription->offer->credit }}</span>
          <span class="info-box-number text-red-500">
            @if($inscription->exam)
                <span>
                   disponible 
                </span>
            @else
            <span>
                Bientôt disponible  
             </span>
            @endif
            
        </span>
        </div>
        <!-- /.info-box-content -->
    </div>
   </a>
    @endforeach
</div>