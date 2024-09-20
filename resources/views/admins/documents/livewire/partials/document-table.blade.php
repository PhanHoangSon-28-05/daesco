@if ($documents && $documents->count() > 0)
    @foreach ($documents as $document)
        <tr class="border border-secondary">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $document->title ?? '' }}</td>
            <td>{{ trim($document->file ?? '', 'documents/') }}</td>
            <td>{{ $document->download_count ?? 0 }}</td>
            <td>
                {{-- @if (isset($document->published_year) && $document->published_year <= 2018)
                {{ $document->published_year }}
                @else
                {{ date('d/m/Y', strtotime($document->created_at)) }}
                @endif --}}
                {{ Carbon\Carbon::parse($document->published_date ?? $document->created_at)->format('d/m/y') }}
            </td>
            <td>{{ $document->category->name_vi ?? '' }}
                @if (isset($document->category->name_en))
                    ({{ $document->category->name_en ?? '' }})
                @endif
            </td>
            <td class="text-nowrap">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#crudDocumentModal"
                    data-document-id={{ $document->id }}><i class="fa-solid fa-pen"></i></button>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#crudDocumentModal"
                    data-document-id={{ -$document->id }}><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
    @endforeach
@else
    <tr class="border border-secondary">
        <td colspan="5" class="text-center">(Không tìm thấy tài liệu)</td>
    </tr>
@endif
