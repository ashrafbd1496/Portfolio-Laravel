@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.external_url') }}</h4>
                @if (isset($external_url))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('external-url.update', $external_url->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" value="{{ $external_url->btn_name }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link" value="{{ $external_url->btn_link }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_type" class="col-form-label">{{ __('content.btn_type') }}</label>
                                    <select class="form-control" name="button_type" id="button_type">
                                        <option value="external_url" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="external_url" {{ $external_url->button_type == "external_url" ? 'selected' : '' }}>{{ __('content.external_url') }}</option>
                                        <option value="get_offer" {{ $external_url->button_type == "get_offer" ? 'selected' : '' }}>{{ __('content.get_offer') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable" {{ $external_url->status == "enable" ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                        <option value="disable" {{ $external_url->status == "disable" ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                                @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                    @include('admin.demo_mode.demo-mode')
                                @else
                                    <form action="{{ route('external-url.store') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="button_type" class="col-form-label">{{ __('content.btn_type') }} </label>
                                    <select class="form-control" name="button_type" id="button_type">
                                        <option value="external_url" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="external_url">{{ __('content.external_url') }}</option>
                                        <option value="get_offer">{{ __('content.get_offer') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="enable">{{ __('content.enable') }}</option>
                                        <option value="disable">{{ __('content.disable') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.offer_messages') }}</h6>
                        <div>
                            <form class="d-block  ml-auto" action="{{ route('get-offer-message.mark_all_read_update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary mb-3ine">
                                    <i class="fas fa-bookmark"></i> {{ __('content.mark_all_as_read') }}
                                </button>
                            </form>
                        </div>
                    </div>

                    @if (count($messages) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.email') }}</th>
                                <th>{{ __('content.phone') }}</th>
                                <th>{{ __('content.service_name') }}</th>
                                <th>{{ __('content.special_request') }}</th>
                                <th>{{ __('content.read_status') }}</th>
                                <th>{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ $message->service_name }}</td>
                                    <td>{{ $message->special_request }}</td>
                                    <td>
                                        @if($message->read == 0)
                                            <span>{{ __('content.unread') }}</span>
                                        @else
                                            <span>{{ __('content.read') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            @if ($message->read == 0)
                                                <form class="d-inline" action="{{ route('get-offer-message.update', $message->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" data-toggle="tooltip"  class="btn btn-primary mr-2 pt-2 pb-2 pr-3 pl-3" data-original-title="{{ __('content.mark') }}">
                                                        <i class="fas fa-bookmark"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $message->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="messageModalCenterTitle">{{ __('content.delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('content.you_wont_be_able_to_revert_this') }}
                                            </div>
                                            <div class="modal-footer">
                                                <form class="d-inline-block" action="{{ route('get-offer-message.destroy', $message->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->

@endsection