@extends('layouts.default')

@section('content')

<style>
	.select2-is-invalid{
		border-color: #fd397a !important;
	}
</style>

<script>
	window.onload = function() {
		$('#select-category').val(<?=$article->category_id?>);
		$('#select-category').select2({
    		placeholder: 'Select Category',
    		allowClear: true,
    		width: '100%',
    	});
		$( "#kt_form_1" ).validate({
			// define validation rules
			rules: {
				"Article[category_id]": {
					required: true
				},
				"Article[content]": {
					required: true
				},
			},
			//display error alert on form submit
			invalidHandler: function(event, validator) {
				var alert = $('#kt_form_1_msg');
				alert.removeClass('kt--hide').show();
				KTUtil.scrollTop();
			},

			submitHandler: function (form) {
				form[0].submit(); // submit the form
			},
			errorElement: 'div',
			errorClass: 'error invalid-feedback',
			errorPlacement: function(error, element) {
				if($(element).hasClass('kt-select2')) {
					error.insertAfter($(element).next('span'));
				} else {
					error.insertAfter(element);
				}
			},
			highlight: function (element) { // hightlight error inputs
				if($(element).hasClass('kt-select2')) {
					$($($($(element).next()[0]).children()[0]).children()[0]).addClass('select2-is-invalid');
				} else {
					$(element).addClass('is-invalid'); // set error class to the control group
				}
			},

			unhighlight: function (element) { // revert the change done by hightlight
				if($(element).hasClass('kt-select2')) {
					$($($($(element).next()[0]).children()[0]).children()[0]).removeClass('select2-is-invalid');
					//$(element).next('span').removeClass('is-invalid');
				} else {
					$(element).removeClass('is-invalid'); // set error class to the control group
				}
			},
		});
	};
</script>
<!--begin::Portlet-->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="fa fa-plus"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Edit Article
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-actions">
					<a href="<?=URL::to('article/view?id='.$article->id)?>" class="btn btn-clean btn-sm btn-icon btn-icon-md">
						<i class="fa fa-list"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body kt-portlet__body--fit" id="posts-container">
		<!--begin::Form-->
			<form class="kt-form kt-form--label-right" id="kt_form_1" action="<?=URL::to('article/edit')?>" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="Article[id]" value="<?=$article->id?>" />
				<div class="kt-portlet__body">
					<?php
						if(Session::has('error_msg')){
				          ?>
					<div class="alert alert-danger  fade show" role="alert">
						<div class="alert-icon"><i class="flaticon-warning"></i></div>
						<div class="alert-text"><?=Session::get('error_msg')?></div>
						<div class="alert-close">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="la la-close"></i></span>
							</button>
						</div>
					</div>
					<?php
						}
				          ?>
					<div class="form-group form-group-last kt-hide">
						<div class="alert alert-danger" role="alert" id="kt_form_1_msg">
							<div class="alert-icon"><i class="flaticon-warning"></i></div>
							<div class="alert-text">
								Oh snap! Change a few things up and try submitting again.
							</div>
							<div class="alert-close">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="la la-close"></i></span>
								</button>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Category:</label>
						<select class="form-control kt-select2" id="select-category" name="Article[category_id]">
							<option></option>
							<?php foreach ($categories as $category){?>
							<option value="<?=$category->id?>"><?=$category->name?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Content:</label>
						<textarea name="Article[content]" class="form-control" ><?=$article->content?></textarea>
					</div>

				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-9 ml-lg-auto">
								<button type="submit" class="btn btn-brand">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>

<!--end::Portlet-->
@endsection