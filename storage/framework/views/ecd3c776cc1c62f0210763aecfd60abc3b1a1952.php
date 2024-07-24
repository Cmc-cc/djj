<?php $__env->startSection('content'); ?>
    <style type="text/css">
        .btn-group>.btn:first-child{
            width: 84px;
        }
    </style>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">游戏记录</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.game_record.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th style="width: 10%">注单号</th>
                        <th style="width: 15%">账号</th>
                        
                        <th style="width: 3%">平台名称</th>
                        <th style="width: 3%">游戏类别</th>
                        <th style="width: 5%">输赢情况</th>
                        <th style="width: 5%">下注金额</th>
                        <th style="width: 5%">有效下注</th>
      <!--                  <th style="width: 8%">期号</th>-->
      <!--                  <th style="width: 6%">游戏名称</th>-->
						<!--<th style="width: 8%">玩法</th>-->
      <!--                  <th style="width: 8%">下注内容</th>-->
      <!--                  <th style="width: 6%">开奖结果(预留)</th>-->
      <!--                  <th style="width: 10%">状态</th>-->
                        <th style="width: 10%">是否返水</th>
                        <th style="width: 20%">下注时间</th>
                    </tr>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->member): ?>
                        <tr>
                            <td>
                                <?php echo e($item->billNo); ?>

                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-xs btn-primary">
                                        <?php echo e(isset($item->member->name) ? $item->member->name : '已删除'); ?>

                                    </button>
                                    <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" class="show-cate" data-uri="<?php echo e(route('member.checkBalance', ['id' => $item->member->getKey()])); ?>">查看</a></li>
                                        <li><a href="<?php echo e(route('member.edit', ['id' => $item->member->getKey()])); ?>">修改</a></li>
                                        <li><a href="<?php echo e(route('member.assign', ['id' => $item->member->getKey()])); ?>">分配代理</a></li>

                                         <?php if($item->member->status == 0): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->member->getKey(), 'status' => 1])); ?>" onclick="return confirm('确定禁用吗？')">禁用</a></li>
                                         <?php elseif($item->member->status == 1): ?>
                                            <li><a href="<?php echo e(route('member.check', ['id' => $item->member->getKey(), 'status' => 0])); ?>" onclick="return confirm('确定启用吗？')">启用</a></li>
                                         <?php endif; ?>
                                        
                                    </ul>
                                </div>                                    
                            </td>
                            
                            
                            
                            <td>
                              <?php echo e(isset($item->api->api_name) ? $item->api->api_name : '已下线'); ?>

                            </td>
                            <td>
                                <?php echo e(config('platform.game_type')[$item->gameType]); ?>

                            </td>
                            <td>
                                <?php echo e($item->netAmount); ?>

                            </td>
                            <td>
                                <?php echo e($item->betAmount); ?>

                            </td>
                            <td>
                                <?php echo e($item->validBetAmount); ?>

                            </td>
       <!--                     <td>-->
							<!--<?php echo e($item->fExpect); ?>-->
       <!--                     </td>-->
       <!--                     <td>-->
       <!--                         -->
       <!--                         <?php echo e($item->gamename); ?>-->
       <!--                     </td>-->
       <!--                     <td>-->
							<!--<?php echo e($item->BetAlias); ?>-->
       <!--                     </td>-->
							<!--<td>-->
							<!--<?php echo e($item->stringex); ?>-->
       <!--                     </td>-->
       <!--                     <td>-->
       <!--                         <?php echo e($item->fResultContent); ?>-->
       <!--                     </td>-->
       <!--                     <td>-->
							<!--<?php echo e($item->round); ?>-->
       <!--                     </td>-->
														
                            <td>
                                <?php if($item->isfs == 1): ?>
                                    <span style="color: green">已返水</span>
                                <?php else: ?>
                                    <span style="color: red;">未返水</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($item->betTime); ?>

                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tfoot>
                    <tr>
                        <td><strong style="color: red">总合计</strong></td>
                        <td colspan="3"></td>
                        <td><strong style="color: red"><?php echo e($total_netAmount); ?></strong></td>
                        <td><strong style="color: red"><?php echo e($total_betAmount); ?></strong></td>
                        <td><strong style="color: red"><?php echo e($total_validBetAmount); ?></strong></td>
                        <td colspan="4"></td>
                    </tr>
                    </tfoot>
                </table>
                <div class="clearfix">
                    <div class="pull-left" style="margin: 0;">
                        <p>总共 <strong style="color: red"><?php echo e($data->total()); ?></strong> 条</p>
                    </div>
                    <div class="pull-right" style="margin: 0;">
                        <?php echo $data->appends(['playerName' => $playerName, 'start_at' => $start_at, 'end_at' => $end_at, 'api_type' => $api_type, 'gameType' => $gameType])->links(); ?>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /.content -->

    <script>
         $(function(){
             $('.show-cate').click(function(){
                 var url = $(this).attr('data-uri');
                 layer.open({
                     type: 2,
                     title: '记录',
                     shadeClose: false,
                     shade: 0.8,
                     area: ['90%', '90%'],
                     content: url
                 });
             })
         });
     </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>