<table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Parent_trans.Name_Father') }}</th>
                            <th>{{ trans('Parent_trans.Email') }}</th>
                            <th>{{ trans('Parent_trans.Address_Father') }}</th>
                            <th>{{ trans('Parent_trans.Job_Father') }}</th>
                            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Parents as $parent)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $parent->Name_Father }}</td>
                                <td>{{ $parent->Email }}</td>
                                <td>{{ $parent->Address_Father }}</td>
                                <td>{{ $parent->Job_Father }}</td>
                                <td>{{ $parent->National_ID_Father }}</td>
                                <td>{{ $parent->Phone_Father }}</td>
                            </tr>
                        @endforeach
                </table>