/*
  Highcharts JS v6.1.3 (2018-09-12)
 Highcharts variwide module

 (c) 2010-2017 Torstein Honsi

 License: www.highcharts.com/license
*/
(function(c){"object"===typeof module&&module.exports?module.exports=c:"function"===typeof define&&define.amd?define(function(){return c}):c(Highcharts)})(function(c){(function(b){var c=b.addEvent,p=b.seriesType,l=b.seriesTypes,k=b.each,n=b.pick;p("variwide","column",{pointPadding:0,groupPadding:0},{pointArrayMap:["y","z"],parallelArrays:["x","y","z"],processData:function(){this.totalZ=0;this.relZ=[];l.column.prototype.processData.call(this);k(this.xAxis.reversed?this.zData.slice().reverse():this.zData,
function(a,g){this.relZ[g]=this.totalZ;this.totalZ+=a},this);this.xAxis.categories&&(this.xAxis.variwide=!0,this.xAxis.zData=this.zData)},postTranslate:function(a,g,b){var d=this.xAxis,e=this.relZ;a=d.reversed?e.length-a:a;var m=d.reversed?-1:1,h=d.len,c=this.totalZ,d=a/e.length*h,q=(a+m)/e.length*h,f=n(e[a],c)/c*h,e=n(e[a+m],c)/c*h;b&&(b.crosshairWidth=e-f);return f+(g-d)*(e-f)/(q-d)},translate:function(){var a=this.options.crisp;this.options.crisp=!1;l.column.prototype.translate.call(this);this.options.crisp=
a;var g=this.chart.inverted,b=this.borderWidth%2/2;k(this.points,function(d,a){var e=this.postTranslate(a,d.shapeArgs.x,d),c=this.postTranslate(a,d.shapeArgs.x+d.shapeArgs.width);this.options.crisp&&(e=Math.round(e)-b,c=Math.round(c)-b);d.shapeArgs.x=e;d.shapeArgs.width=c-e;d.plotX=(e+c)/2;g?d.tooltipPos[1]=this.xAxis.len-this.postTranslate(a,this.xAxis.len-d.tooltipPos[1]):d.tooltipPos[0]=this.postTranslate(a,d.tooltipPos[0])},this)}},{isValid:function(){return b.isNumber(this.y,!0)&&b.isNumber(this.z,
!0)}});b.Tick.prototype.postTranslate=function(a,b,c){var d=this.axis,e=a[b]-d.pos;d.horiz||(e=d.len-e);e=d.series[0].postTranslate(c,e);d.horiz||(e=d.len-e);a[b]=d.pos+e};c(b.Axis,"afterDrawCrosshair",function(a){this.variwide&&this.cross&&this.cross.attr("stroke-width",a.point&&a.point.crosshairWidth)});c(b.Axis,"afterRender",function(){var a=this;!this.horiz&&this.variwide&&this.chart.labelCollectors.push(function(){return b.map(a.tickPositions,function(b,c){b=a.ticks[b].label;b.labelrank=a.zData[c];
return b})})});c(b.Tick,"afterGetPosition",function(a){var b=this.axis,c=b.horiz?"x":"y";b.categories&&b.variwide&&(this[c+"Orig"]=a.pos[c],this.postTranslate(a.pos,c,this.pos))});b.wrap(b.Tick.prototype,"getLabelPosition",function(b,c,m,d,e,l,h,k){var a=Array.prototype.slice.call(arguments,1),f=e?"x":"y";this.axis.variwide&&"number"===typeof this[f+"Orig"]&&(a[e?0:1]=this[f+"Orig"]);a=b.apply(this,a);this.axis.variwide&&this.axis.categories&&this.postTranslate(a,f,k);return a})})(c)});
//# sourceMappingURL=variwide.js.map
