<table class="mb-0 table table-hover table-list-event">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th width="15%">Tên sự kiện</th>
            <th width="65%">Nội dung</th>
            <th width="5%">
                <button class="btn btn-danger btn-delete-events" disabled>Delete</button>
            </th>
            <th width="10%" class="col-search">
                <i class="pe-7s-search toggle-search" data-toggle="tooltip" title="toggle search"></i>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="row-search">
            <th width="5%">*</th>
            <td width="15%">
                <input type="text" class="form-control input-sm">
            </td>
            <td width="65%">
                <input type="text" class="form-control input-sm">
            </td>
            <td width="5%" class="text-center">
                <input class="styled-checkbox checkbox-all" id="styled-checkbox-all" type="checkbox" value="value1">
                <label for="styled-checkbox-all"></label>
            </td>
            <td width="10%">
                <i class="fas fa-eraser clear-filter" data-toggle="tooltip" title="clear filter"></i>
            </td>
        </tr>
        @foreach ($events as $event)
            <tr style="cursor: pointer;" class="row-content" data-event="{{ $event->id }}">
                <th width="5%">{{ ($events->currentPage() - 1) * 5 + $loop->iteration }}</th>
                <td width="15%">{{ $event->name }}</td>
                <td width="60%">{{ $event->content }}</td>
                <td width="5%" class="text-center td-checkbox">
                    <input class="styled-checkbox event-checkbox" id="{{ 'styled-checkbox-' . $loop->iteration }}" type="checkbox" value="value1">
                    <label for="{{ 'styled-checkbox-' . $loop->iteration }}" class="label-checkbox"></label>
                </td>
                <td width="10%">
                    <i class="fas fa-pencil-alt"></i>
                    <i class="fas fa-trash-alt fa-delete-event"></i>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-3">
{!! $events->links() !!}
</div>
