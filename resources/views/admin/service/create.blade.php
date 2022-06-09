@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.services') }}</h6>
                        <div>
                            <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal" data-target="#serviceSectionModal">{{ __('content.section_title_and_desc') }}</button>
                            <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#categoryModal">+ {{ __('content.add_category') }}</button>
                        </div>
                        </div>
                    @if (count($services) > 0)
                        <div>
                            <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                            <label for="check_all">{{ __('content.all') }}</label>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('service-category.destroy_checked') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                @endif

                            <input type="hidden" id="checked_lists" name="checked_lists" value="">

                            <!-- Modal -->
                            <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteCheckedModalCenterTitle">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('content.delete_selected') }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button onclick="btnCheckListGet()" type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.category_name') }}</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th class="custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $desc = count($services); $asc=0; @endphp
                            @foreach ($services as $service)
                                <tr>
                                    <td>
                                        <input  name="check_list[]" type="checkbox" value="{{ $service->id }}" onclick="showHideDeleteButton2(this)"> <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                    </td>
                                    <td>{{ $service->category_name }}</td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ $service->order }}</td>
                                    <td>
                                        @if($service->status == "draft")
                                            <span class="badge badge-danger">{{ __('content.draft') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __('content.published') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('service-category.edit', $service->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModel{{ $service->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                    <div class="modal fade" id="deleteModel{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                                </div>
                                                <div class="modal-footer">
                                                @if ($demo_mode == "on")
                                                    <!-- Include Alert Blade -->
                                                        @include('admin.demo_mode.demo-mode')
                                                    @else
                                                        <form class="d-inline-block" action="{{ route('service-category.destroy', $service->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            @endif

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
    <div class="modal fade" id="serviceSectionModal" tabindex="-1" role="dialog" aria-labelledby="serviceSectionModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="serviceModalLabel">{{ __('content.section_title_and_desc') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if (isset($service_section))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('service-section.update', $service_section->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section_title">{{ __('content.section_title') }} <span class="text-red">*</span></label>
                                            <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $service_section->section_title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                            <textarea name="desc" class="form-control" id="desc" rows="3" required>{{ $service_section->desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                            </form>
                            @else
                                @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                    @include('admin.demo_mode.demo-mode')
                                @else
                                    <form action="{{ route('service-section.store') }}" method="POST">
                                        @csrf
                                        @endif

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="section_title">{{ __('content.section_title') }} <span class="text-red">*</span></label>
                                                    <input type="text" name="section_title" class="form-control" id="section_title" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                                    <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                                    </form>
                                @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-modal="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="categoryModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('service-category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                               <div class="single-clint-area-content">
                                   <fieldset class="form-group">
                                       <legend class="font-14">{{ __('content.type') }}</legend>
                                       <div class="form-check pl-0 mb-2">
                                           <label class="form-check-label">
                                               <input type="radio" class="form-check-input mr-2" name="type" id="optionsRadios1" onclick="showHideTypeDiv()" value="icon" checked=""><span class="ml-3">Icon</span>
                                               <i class="input-helper"></i>
                                           </label>
                                       </div>
                                       <div class="form-check pl-0">
                                           <label class="form-check-label">
                                               <input type="radio" class="form-check-input mr-1" name="type" id="optionsRadios2" onclick="showHideTypeDiv()" value="image"><span class="ml-3">Image</span>
                                               <i class="input-helper"></i></label>
                                       </div>
                                   </fieldset>
                                   <div class="form-group" id="icon-type">
                                       <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                       <div class="btn-group">
                                           <input type="hidden" name="icon" class="form-control" id="icon">
                                           <button type="button" class="btn btn-primary  iconpicker-component"><i id="icon-value" class="iconpicker-component"></i></button>
                                           <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                               <span class="caret"></span>
                                           </button>
                                           <div class="dropdown-menu"></div>
                                       </div>
                                   </div>
                                   <div class="form-group"  id="image-type" style="display: none;">
                                       <label for="service_category_image">{{ __('content.image') }} ({{ __('content.size') }} 60 x 60) (.svg, .jpg, .jpeg, .png)</label>
                                       <input type="file" name="service_category_image" class="form-control-file" id="service_category_image">
                                       <small id="service_category_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                   </div>
                               </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_name">{{ __('content.category_name') }} <span class="text-red">*</span></label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }}</label>
                                    <input type="text" name="title" class="form-control" id="title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="summernote">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="summernote"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_name">{{ __('content.btn_name') }}</label>
                                    <input type="text" name="btn_name" class="form-control" id="btn_name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="btn_link">{{ __('content.btn_link') }}</label>
                                    <input type="text" name="btn_link" class="form-control" id="btn_link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-clint-area-content">
                                    <div class="form-group">
                                        <label for="image_status" class="col-form-label">{{ __('content.image_status') }} </label>
                                        <select class="form-control" name="image_status" id="image_status">
                                            <option value="show" selected>{{ __('content.select_your_option') }}</option>
                                            <option value="show">{{ __('content.show') }}</option>
                                            <option value="hide">{{ __('content.hide') }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="service_category_image">{{ __('content.image') }} ({{ __('content.size') }} 540 x 490) (.svg, .jpg, .jpeg, .png)</label>
                                        <input type="file" name="service_category_image" class="form-control-file" id="service_category_image">
                                        <small id="service_category_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="col-form-label">{{ __('content.status') }}</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="published" selected>{{ __('content.select_your_option') }}</option>
                                        <option value="published">{{ __('content.published') }}</option>
                                        <option value="draft">{{ __('content.draft') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection