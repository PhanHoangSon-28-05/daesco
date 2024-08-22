@if ($posts && $posts->count() > 0)
@foreach ($posts as $post)
    <tr class="border border-secondary">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->name_vi }}</td>
        <td>{{ $post->description_vi }}</td>
        <td>{{ $post->category->name_vi ?? '' }}
            @if (isset($post->category->name_en))
                ({{ $post->category->name_en ?? '' }})
            @endif
        </td>
        <td class="text-nowrap">
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudPostModal"
                data-post-id={{ $post->id }}><i class="fa-solid fa-pen"></i></button>
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#crudPostModal"
                data-post-id={{ -$post->id }}><i class="fa-solid fa-trash"></i></button>
        </td>
    </tr>
@endforeach
@else
    <tr class="border border-secondary">
        <td colspan="5" class="text-center">(Không tìm thấy bài viết)</td>
    </tr>
@endif
