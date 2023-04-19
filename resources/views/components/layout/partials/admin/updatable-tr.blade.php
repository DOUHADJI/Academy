
@aware(['school'])

<tr class="w-full my-3 border-y" id="{{ $offer -> id }}_tr">
    <x-layout.partials.admin.td-cell :value="$offer->code" align="center" />
    <x-layout.partials.admin.td-cell :value="$offer->intitule" align="start" />
    <x-layout.partials.admin.td-cell :value="$offer->credit" align="center" />
    <x-layout.partials.admin.td-cell :value="$offer->nature" align="center" />
    <x-layout.partials.admin.td-cell :value="$offer->semestre_academique" align="center" />
    <td class="border-x px-2 py-3">
        <div>
            <a href="{{ route('showOffer', [
                'school' => $school -> sigle,
                "id_parcours" => $schedule -> id,
                "code_cours" => $offer -> code
            ]) }}" 
                class="text-gray-500 p-4 underline">
                modifier
            </a>
        </div>
    </td>
</tr>



