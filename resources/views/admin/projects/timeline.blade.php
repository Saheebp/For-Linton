@extends('layouts.project')

@section('page')
                                        <div class="tab-pane p-3" id="tab4">
                                            <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Project Time line</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->
                                            
                                            <?php
                                                $totalweeks = round(( strtotime($project->end) - strtotime($project->start)) / 3600 / 24 / 7);
                                            ?>

                                            <div class="table-responsive text-nowrap overflow-auto ">
                                                <table id="example1" class="table w-100">
                                                    <tbody>
                                                            <tr>
                                                                <th style="width:40%">
                                                                    <div>Name</div>
                                                                </th>
                                                                @for ($i = 1; $i <= $totalweeks; $i++ )
                                                                <th>
                                                                   Week {{ $i }}
                                                                </th>
                                                                @endfor
                                                            </tr>

                                                            @foreach ($flots as $flot)
                                                            <tr>
                                                                <td>
                                                                    {{ $flot['name'] }}
                                                                </td>

                                                                @for ($i = 1; $i <= $flot['preoffset']; $i++ )
                                                                <td>
                                                                    &nbsp;
                                                                </td>
                                                                @endfor

                                                                @for ($i = 1; $i <= $flot['length']; $i++ )
                                                                <td>
                                                                    <div class="badge badge-{{$flot['status_style']}} w-100">&nbsp;</div>
                                                                </td>
                                                                @endfor

                                                                @for ($i = 1; $i <= $flot['postoffset']; $i++ )
                                                                <td>
                                                                    &nbsp;
                                                                </td>
                                                                @endfor
                                                            </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
@stop
