<div class="container-fluid" style="margin-bottom: 10px;">
    <form action="" method="get" id="searchForm">
        <div class="row">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">活动标题</span>
                    <input type="text" class="form-control" name="title" placeholder="关键字" value="{{ $title }}">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">用户名称</span>
                    <input type="text" class="form-control" name="name" placeholder="关键字" value="{{ $name }}">
                </div>
            </div>
            <div class="col-lg-3 pull-right">
                <div class="input-group">
					<a href="javascript:void(0)" class="btn btn-danger" id="delAll" data-ids="" data-toggle="modal" data-target="#delete-modal" data-url="{{route('activity_apply.delall')}}">删除选中</a>&nbsp;
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                </div>
            </div>
        </div>
    </form>
</div>