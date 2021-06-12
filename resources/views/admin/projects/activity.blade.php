@extends('layouts.project')

@section('page')
                                        <div class="tab-pane p-3" id="tab3">
                                            <h4 class="card-title" style="margin-bottom:30px; margin-top:30px;">Recent Activity</h4>
                                            <!-- <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </p> -->

                                            @if ($project->logs->count() != 0)
                                            <table id="example1" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width:20%;">Date</th>
                                                        <th style="width:80%;">Activity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project->logs as $log)
                                                        <tr>
                                                            <td class="text-left">
                                                                {{ date('d M Y, H:ia', strtotime($log->created_at)) }}
                                                            </td>
                                                            <td style="width:10%;">
                                                                {{ $log->body ?? '' }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif

                                        </div>
@stop
