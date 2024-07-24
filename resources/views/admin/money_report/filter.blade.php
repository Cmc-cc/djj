<div class="container-fluid" style="margin-bottom: 10px;">
	<form action="" method="get" id="searchForm">
		<div class="row">
			<div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">账户</span>
                    <input type="text" class="form-control"  id="name" name="name" placeholder="关键字" value="{{ $name }}">
                </div>
            </div>

            <div class="col-lg-6">
            	<div class="input-group">
            		<span class="input-group-addon">时间范围</span>
            		<div class="btn-group" id="time-quick">
	            		<button type="button" class="btn btn-default">前3天</button>
	            		<button type="button" class="btn btn-default">前7天</button>
	            		<button type="button" class="btn btn-default">前15天</button>
                        <button type="button" class="btn btn-default">前30天</button>
	            	</div>
            	</div>
            </div>
		</div>

		<div class="row" style="margin-top: 5px;">
			<div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">开始时间</span>
                    <input type="text" class="form-control" name="start_at" id="start_at" value="{{ $start_at }}" readonly>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon">结束时间</span>
                    <input type="text" class="form-control" name="end_at" id="end_at" value="{{ $end_at }}" readonly>
                </div>
            </div>
            <div class="col-lg-2 pull-right">
                <div class="input-group">
                    <button type="submit" class="btn btn-primary">搜索</button>&nbsp;
                    <button type="button" class="btn btn-warning" id="restSearchForm">重置</button>&nbsp;
                     <button type="button" class="btn btn-warning" onclick="location.href='/admin/money_report_export?name='+$('#name').val()+'&start_at='+$('#start_at').val()+'&end_at='+$('#end_at').val()">导出</button>&nbsp;
                </div>
            </div>
		</div>

	</form>
</div>