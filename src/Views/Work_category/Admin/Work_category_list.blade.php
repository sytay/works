@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('work::work_category_admin.categories_list') }}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        <i class="fa fa-group"></i> 
                        {!! $request->all() ? 
                            trans('work::work_category_admin.page_search') : trans('work::work_category_admin.categories_list') 
                        !!}
                    </h3>
                </div>
                <!--MESSAGE-->
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success flash-message">{!! $message !!}</div>
                @endif
                <!--/END MESSAGE-->

                <!--ERRORS-->
                @if($errors && ! $errors->isEmpty() )
                @foreach($errors->all() as $error)
                <div class="alert alert-danger flash-message">{!! $error !!}</div>
                @endforeach
                @endif 
                <!--/END ERRORS-->
                <div class="panel-body">
                    @if(isset($_GET['category_name']))
                    @include('work::work_category.admin.work_category_item')
                    @else
                    @include('work::work_category.admin.work_category_treeview')
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('work::work_category.admin.work_category_search')
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<!-- DELETE CONFIRM -->
<script>
    $(".delete").click(function () {
        return confirm("Are you sure to delete this item?");
    });
</script>
<!-- /END DELETE CONFIRM -->
@stop