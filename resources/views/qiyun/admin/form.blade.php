 @extends('qiyun.layouts.layoutAdmin')
  @section('content')
		<div class="main-content">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="icon-home home-icon"></i>
					<a href="#">Home</a>
				</li>

				<li>
					<a href="#">Forms</a>
				</li>
				<li class="active">Form Elements</li>
			</ul><!-- .breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="icon-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- #nav-search -->
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1>
					Form Elements
					<small>
						<i class="icon-double-angle-right"></i>
						Common form elements and layouts
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					<form class="form-horizontal" role="form" action="{{asset('doaddgood')}}" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品名称 </label>

							<div class="col-sm-9">
								<input type="text" name="goodname" id="form-field-1" placeholder="goodname" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 原价 </label>

							<div class="col-sm-9">
								<input type="text" name="oldprice" id="form-field-1" placeholder="oldprice" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 现价 </label>

							<div class="col-sm-9">
								<input type="text" name="price" id="form-field-1" placeholder="price" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择商品图 </label>

							<div class="col-sm-9">
								<input type="file" name="goodimg" id="form-field-1" placeholder="img" class="col-xs-10 col-sm-5" />
							</div>

						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="icon-ok bigger-110"></i>
									Submit
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="icon-undo bigger-110"></i>
									Reset
								</button>
							</div>
						</div>

						<div class="hr hr-24"></div>

					<input type="hidden" name="_token" value="{{csrf_token()}}"/>	
					</form>

				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div><!-- /.main-content -->
  @endsection