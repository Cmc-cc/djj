@php($path = 'member.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <div id="layout-main-area">
        <div id="main-menu">
            <div class="menu-area">
                <ul class="list-group">
                    <li class="list-group-item system-message">
                        <a href="{{ route('member.service_center') }}">公告信息</a>
                    </li>
                    <li class="list-group-item complaint">
                        <a href="{{ route('member.complaint_proposal') }}">意见反馈</a>
                    </li>
                    <li class="list-group-item activity">
                    <a href="{{ route('member.my_activity') }}">活动列表</a>
                    </li>
                    <li class="list-group-item mymessage active">
                        <a href="{{ route('member.message_list') }}">我的消息</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="main-container">
            <div class="module-main" style="height: 630px; overflow: auto">
                <div class="table-top">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr><th style="width: 20%">时间</th>
                            <th style="width: 30%">标题</th>
                            <th>内容</th>
                        </tr></thead>
                        <tbody></tbody>
                    </table>
                    <div class="tcdPageCode"><span class="disabled">上一页</span><span class="disabled">下一页</span></div>
                </div>
            </div>
            <div class="loading_shadow hide" style="display: none;">
                <div class="shadow"></div>
                <img src="./ 85611953：_files/loading-win8.gif" class="loading_win">
            </div>
        </div>

        <script type="text/javascript">
            var initPage=false;  //初始状态
            var tbodyHtml='';  //tbody tag

            var getList = function (filter) {
                $('.loading_shadow').show();
                $.ajax({
                    type : 'GET',
                    url : "http://127.0.0.1/member/messageList?page="+filter.page,
                    success : function(data){
                        console.log(data);
                        $('.loading_shadow').hide();
                        var data=data;
                        var totalPage=Math.ceil(data.total/data.per_page);
                        var currentPage=data.current_page;

                        tbodyHtml='';

                        for(var i=0;i<data.data.length;i++){
                            console.log(data.data[i].pivot.is_read);
                            href= data.data[i].url?data.data[i].url:'javascript:;';
                            tbodyHtml+='<tr>';
                            tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
                            tbodyHtml+='   <td><a href="'+href+'" target="_blank">'+data.data[i].title+'</a></td>';
                            tbodyHtml+='   <td>'+data.data[i].content+'</td>';
                            tbodyHtml+='<tr>';
                        }

                        $('tbody').html(tbodyHtml);

                        if (initPage == false) {

                            $(".tcdPageCode").createPage({
                                pageCount: totalPage,
                                current: currentPage,
                                backFn: function (p) {
                                    $('.loading_shadow').show();
                                    search(p);
                                }
                            });
                            $('.loading_shadow').hide();
                            initPage = true;
                        } else {

                            $(".tcdPageCode").createPage({
                                pageCount: totalPage,
                                current: filter.page,
                                backFn:function(){
                                    $('.loading_shadow').show();
                                }
                            });
                            $('.loading_shadow').hide();
                        }
                    }
                })
            };

            var search = function (p,type) {
                var filter = {
                    page: p
                }

                getList(filter);

            };

            search(1);
        </script>
    </div>
    <script type="text/javascript">
    var initPage=false;  //初始状态
    var tbodyHtml='';  //tbody tag

    var getList = function (filter) {
     $('.loading_shadow').show();
     $.ajax({  
        type : 'GET',
        url : "{{ route('member.messageList') }}?page="+filter.page,
        success : function(data){
            console.log(data);
        $('.loading_shadow').hide();
        var data=data;
         var totalPage=Math.ceil(data.total/data.per_page);
         var currentPage=data.current_page;

         tbodyHtml='';

          for(var i=0;i<data.data.length;i++){
                  href= data.data[i].url?data.data[i].url:'javascript:;';
            tbodyHtml+='<tr>';
            tbodyHtml+='   <td>'+data.data[i].created_at+'</td>';
            tbodyHtml+='   <td><a href="'+href+'" target="_blank">'+data.data[i].title+'</a></td>';
            tbodyHtml+='   <td>'+data.data[i].content+'</td>';
            tbodyHtml+='<tr>';            
          }
         
         $('tbody').html(tbodyHtml);
               
        if (initPage == false) {

          $(".tcdPageCode").createPage({
            pageCount: totalPage,
            current: currentPage,
            backFn: function (p) {
              $('.loading_shadow').show();
              search(p);
            }
          });
          $('.loading_shadow').hide();
          initPage = true;
        } else {

          $(".tcdPageCode").createPage({
            pageCount: totalPage,
            current: filter.page,
            backFn:function(){
              $('.loading_shadow').show();
            }
          });
          $('.loading_shadow').hide();
        }
    }
      })
    };

    var search = function (p,type) {
      var filter = {
        page: p
      }

      getList(filter);
      
    };

    search(1);
    </script>
@endsection
