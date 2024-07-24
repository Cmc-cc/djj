<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
    @if(in_array('AG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ag.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
	 <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ags.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
	
    @endif
	@if(in_array('IBC2', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ibc2.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('AS', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('as.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	@if(in_array('KG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('kg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('AVIA', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('avia.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
    @if(in_array('BBIN', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('bbin.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('MG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('mg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('BG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('bg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('PT', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('pt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	@if(in_array('HB', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('hb.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('SG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('sg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('IG2', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ig2.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	@if(in_array('QT', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('qt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('IBC', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ibc.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('UG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ug.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('SA', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('sa.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('DS', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ds.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('XHG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('xhg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
	@if(in_array('SS', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ss.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	@if(in_array('PP', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('pp.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('CQ9', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('cq9.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('OG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('og.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif   
    @if(in_array('EG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('eg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('JDB', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('jdb.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
    @if(in_array('DG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('dg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
    @if(in_array('PG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('pg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('BOG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('bog.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('KY', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ky.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	@if(in_array('RT', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('rt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('ISB', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('isb.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('SUNBET', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('sunbet.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
	 <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('sunbets.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
	
    @endif
	@if(in_array('VR', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('vr.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('GJ', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('gj.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('ESB', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('esb.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('SC', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('sc.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('AB', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ab.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
	@if(in_array('AGS', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ags.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('MX', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('mx.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('GD', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('gd.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('VG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('vg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('761', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('761.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
	@if(in_array('EBET', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ebet.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('MT', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('mt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('IG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ig.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('IGZR', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('igzr.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('IM', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('im.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>    
	@endif
	@if(in_array('WM', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('wm.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('JS', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('js.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('VT', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('vt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('BS', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('bs.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('PNG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('png.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
   @if(in_array('N2', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('n2.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
	@if(in_array('PTS', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('pts.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('WG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('wg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('HG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('hg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('NEWVG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('newvg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('MW', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('mw.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>    
	@endif
	@if(in_array('FG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('fg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('LEG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('leg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('IMQP', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('imqp.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	@if(in_array('BGC', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('bgc.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	@if(in_array('NT', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('nt.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('SW', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('sw.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif	
	@if(in_array('NW', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('nw.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('TH', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('th.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
   @if(in_array('KA', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ka.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
   @if(in_array('GB', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('gb.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
   @if(in_array('GBC', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('gbc.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
   @if(in_array('YG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('yg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
   @if(in_array('GG', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('gg.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('GGE', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('gge.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('AE', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ae.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('ISB', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('isb.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('DSQP', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('dsqp.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('GA', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('ga.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('SWC', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('swc.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	@if(in_array('WGQP', $_api_list))
    <div style="width: 300px;height:100px;margin: auto;float:left">
        <iframe src="{{ route('wgqp.game_record') }}" width="100%" height="100%" frameborder="0">

        </iframe>
    </div>
    @endif
	
	
	
	
	
   
</body>
</html>
