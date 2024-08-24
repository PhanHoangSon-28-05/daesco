@if ($recruits && $recruits->count() > 0)
@foreach ($recruits as $recruit)
    <tr class="border border-secondary">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $recruit->title_vi ?? '' }}</td>
        <td>{{ $recruit->position_vi ?? '' }}</td>
        <td>{{ Carbon\Carbon::parse($recruit->expired_at ?? '1-1-1999')->format('d/m/Y') }}</td>
        <td class="text-nowrap">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudRecruitModal"
                data-recruit-id={{ $recruit->id }}><i class="fa-solid fa-pen"></i></button>
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteRecruitModal"
                data-recruit-id={{ $recruit->id }}><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
@endforeach
@else
    <tr class="border border-secondary">
        <td colspan="5" class="text-center">(Không tìm thấy bài viết)</td>
    </tr>
@endif
