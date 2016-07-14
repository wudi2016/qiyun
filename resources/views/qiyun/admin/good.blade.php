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
				<a href="#">Tables</a>
			</li>
			<li class="active">Simple &amp; Dynamic</li>
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
				Tables
				<small>
					<i class="icon-double-angle-right"></i>
					Static &amp; Dynamic Tables
				</small>
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->

				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table id="sample-table-1" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th>id</th>
										<th>商品名称</th>
										<th class="hidden-480">原价</th>

										<th>
											<i class="icon-time bigger-110 hidden-480"></i>
											现价
										</th>
										<th class="hidden-480">商品图片</th>
										<th>操作</th>

									</tr>
								</thead>

								<tbody>

                                    @foreach ($goods as $good)
									<tr>
										<td class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>

										<td>{{ $good->id }}</td>
										<td>{{ $good->goodname }}</td>
										<td class="hidden-480">{{ $good->oldprice }}</td>
										<td>{{ $good->price }}</td>

										<td class="hidden-480">
											<img width="40" src="{{asset( $good->img )}}">
										</td>

										<td>
											<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

											    <a href="">
												<button class="btn btn-xs btn-success">
													<i class="icon-ok bigger-120"></i>
												</button>
												</a>

                                                <a href="{{asset( 'edit/'.$good->id )}}">
												<button class="btn btn-xs btn-info">
													<i class="icon-edit bigger-120"></i>
												</button>
												</a>

                                                <a href="{{asset( 'del/'.$good->id )}}">
												<button class="btn btn-xs btn-danger">
													<i class="icon-trash bigger-120"></i>
												</button>
												</a>
                                                
                                                <a href=""> 
												<button class="btn btn-xs btn-warning">
													<i class="icon-flag bigger-120"></i>
												</button>
												</a>
											</div>

											<div class="visible-xs visible-sm hidden-md hidden-lg">
												<div class="inline position-relative">
													<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
														<i class="icon-cog icon-only bigger-110"></i>
													</button>

													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
														<li>
															<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																<span class="blue">
																	<i class="icon-zoom-in bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																<span class="green">
																	<i class="icon-edit bigger-120"></i>
																</span>
															</a>
														</li>

														<li>
															<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																<span class="red">
																	<i class="icon-trash bigger-120"></i>
																</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</td>
									</tr>
                                    @endforeach

								</tbody>
							</table>

							<div class="row">
							     <div class="col-sm-6">
							         <!-- <div class="dataTables_info" id="sample-table-2_info">Showing 1 to 10 of 23 entries</div> -->
							     </div>
							     <div class="col-sm-6">
							     <div class="dataTables_paginate paging_bootstrap">
<!-- 							       <ul class="pagination">
							          <li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i></a></li>
							          <li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li>
							          <li class="next"><a href="#"><i class="icon-double-angle-right"></i></a></li>
							       </ul> -->
							       {!! $goods->render() !!}
							     </div>
							     </div>
							</div>
						</div><!-- /.table-responsive -->
					</div><!-- /span -->
				</div><!-- /row -->

				<div class="hr hr-18 dotted hr-double"></div>
				
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div><!-- /.main-content -->
@endsection