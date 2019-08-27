@extends('layouts.default')

@section('content')

<script>
	function onDeletePress(id){
		swal.fire({
			title: 'Are you sure you want to delete this article',
			text: "After you delete it, you cannot restore it",
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes',
			cancelButtonText: 'Cancel',
			reverseButtons: true
		}).then(function(result){
			if (result.value) {
				$('#delete-article-form').submit();
			} else if (result.dismiss === 'cancel') {
				swal.fire(
					'You have cancelled the delete request',
					'Field is safe',
					'error',
				);
			}
		});
	}
</script>

<form action="<?=URL::to('article/delete')?>" method="post" id="delete-article-form">
	{{ csrf_field() }}
	<input id="delete-article-id" value="<?=$article->id?>" type="hidden" name="id">
</form>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="fa fa-home"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Article View
				</h3>
			</div>
		</div>
		<div class="kt-portlet__body kt-portlet__body--fit" id="posts-container">
			<!-- Looper -->
			<div class="kt-portlet kt-portlet--height-fluid kt-widget19">
			    <div class="kt-portlet__body">
			        <div class="kt-widget19__wrapper">
			            <div class="kt-widget19__content">
			                <div class="kt-widget19__info">
			                    <a href="#" class="kt-widget19__username">
									<?=$article->user->first_name.' '.$article->user->last_name?>
								</a>
			                    <span class="kt-widget19__time">
									<?=$article->category->name?>
								</span>
			                </div>
			            </div>
			            <div class="kt-widget19__text text-container">
			                <?=$article->content?>
			            </div>
			        </div>
			        <?php if($article->created_by == Session::get('userid')) { ?>
			        <div class="kt-widget19__action">
			            <a href="<?=URL::to('article/edit?id='.$article->id)?>" class="btn btn-sm btn-label-brand btn-bold">Edit</a>
			            <a href="javascript:onDeletePress(<?=$article->id?>);" class="btn btn-sm btn-label-danger btn-bold">Delete</a>
			        </div>
			    	<?php } ?>
			    </div>
			</div>
			<!-- Looper -->
		</div>
	</div>
</div>

@endsection