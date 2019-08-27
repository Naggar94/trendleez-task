@extends('layouts.default')

@section('content')

<style>
	.text-container{
		display: block; /* or inline-block */
		text-overflow: ellipsis;
		word-wrap: break-word;
		overflow: hidden;
		max-height: 3.6em;
		line-height: 1.8em;
	}
</style>

<script>
	var page_number = 1;
	function appendPosts(posts){
		var articleViewEndpoint = "<?=URL::to('article/view?id=')?>";
		for(var i=0;i<posts.length;i++){
			var row ='<div class="kt-portlet kt-portlet--height-fluid kt-widget19">';
			    row += '<div class="kt-portlet__body">';
			        row += '<div class="kt-widget19__wrapper">';
			            row += '<div class="kt-widget19__content">';
			                row += '<div class="kt-widget19__info">';
			                    row += '<a href="#" class="kt-widget19__username">';
									row += posts[i]['user_name'];
								row += '</a>';
			                    row += '<span class="kt-widget19__time">';
									row += posts[i]['category_name'];
								row += '</span>';
			                row += '</div>';
			            row += '</div>';
			            row += '<div class="kt-widget19__text text-container">';
			                row += posts[i]['content'];
			            row += '</div>';
			        row += '</div>';
			        row += '<div class="kt-widget19__action">';
			            row += '<a href="'+articleViewEndpoint+posts[i]['id']+'" class="btn btn-sm btn-label-brand btn-bold">View</a>';
			        row += '</div>';
			    row += '</div>';
			row += '</div>';
			$('#posts-container').append(row);
		}

		if (posts.length != 0 && posts.length % 10 == 0){
			var button = '<button id="load-more-button" onclick="loadData(false)" type="button" class="btn btn-outline-primary">Load More</button>';
			$('#posts-container').append(button);
		}
	}

	function displayError(msg){
		var row = '<div class="alert alert-danger  fade show" role="alert">';
			row += '<div class="alert-icon"><i class="flaticon-warning"></i></div>';
			row += '<div class="alert-text">'+msg+'</div>';
			row += '<div class="alert-close">';
				row += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
					row += '<span aria-hidden="true"><i class="la la-close"></i></span>';
				row += '</button>';
			row += '</div>';
		row += '</div>';

		$('#posts-container').prepend(row);
	}

	function loadData(wipe){
		$('#load-more-button').remove();
		if (wipe){
			page_number = 1;
		}else{
			page_number++;
		}

		KTApp.block('#posts-container', {
			overlayColor: '#000000',
			type: 'v2',
			state: 'success',
			message: 'Please Wait...'
		});
		var category_id = $('#select-category').val();
		$.post("<?= URL::to('home/fetch') ?>",
    	{
    		page: page_number-1,
      		category_id: category_id,
        	_token: "{{ csrf_token() }}"
    	},
		function(data, status){
			KTApp.unblock('#posts-container');
			var data = eval("(" + data + ")");
			if (data['success']){
				appendPosts(data['feed']);
			}else{
				$('#kt_scrolltop').trigger('click');
				displayError(data['error_msg']);
			}
		});
	}

	function onCategoryChange(){
		$('#posts-container').empty();
		loadData(true);
	}

	$(document).ready(function(){
		$('#select-category').select2({
    		placeholder: 'Select Category',
    		allowClear: true,
    		width: '100%',
    	});

    	$('#select-category').on('select2:select', function (e) {
			onCategoryChange();
		});

    	$('#select-category').on('select2:unselecting', function (e) {
    		onCategoryChange();
		});
	});
</script>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="kt-portlet">
		<div class="kt-portlet__head">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="fa fa-home"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Home Page
				</h3>
			</div>
			
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-actions">
					<div class="row">
						<div class="col-md-10">
							<select class="kt-select2" id="select-category">
								<option></option>
								<?php foreach($categories as $category){ ?>
									<option value="<?=$category->id?>"><?=$category->name?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-2">
							<?php if (Session::has("userid")){ ?>
							<a href="<?=URL::to('article/add')?>" class="btn btn-clean btn-sm btn-icon btn-icon-md">
								<i class="fa fa-plus"></i>
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body kt-portlet__body--fit" id="posts-container">
			<!-- Looper -->
			<?php foreach($articles as $article){ ?>
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
			        <div class="kt-widget19__action">
			            <a href="<?=URL::to('article/view?id='.$article->id)?>" class="btn btn-sm btn-label-brand btn-bold">View</a>
			        </div>
			    </div>
			</div>
			<?php } ?>
			<!-- Looper -->
			<?php if(count($articles) == 10){ ?>
			<button id="load-more-button" onclick="loadData(false)" type="button" class="btn btn-outline-primary">Load More</button>
			<?php } ?>
		</div>
	</div>
</div>

@endsection