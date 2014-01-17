YAHOO.namespace("TSGlossary.panel");YAHOO.TSGlossary.panel.panels = [];
function createGlossary(id_in, title_in, body_in, context_in){var args={};args.visible=true;args.effect={effect:eval(YAHOO.widget.ContainerEffect.FADE),
duration:0.5}
args.constraintoviewport=false;args.iframe=false;args.fixedcenter=false;args.draggable=true;args.modal=false;args.underlay="shadow";args.close=true;var contextArg=new Array();if(context_in){
contextArg[0]=context_in;contextArg[1]="tl";contextArg[2]="bl";args.context=contextArg;}
var newMod;var isNew=true;if(YAHOO.TSGlossary.panel.panels[id_in]){newMod=YAHOO.TSGlossary.panel.panels[id_in];newMod.cfg.applyConfig(args);isNew=false;}
else{newMod=new YAHOO.widget.Panel(id_in, args);YAHOO.TSGlossary.panel.panels[id_in]=newMod;}
newMod.setHeader(title_in);newMod.setBody("<div class='gd'>"+body_in+"</div>");if(isNew){newMod.render(document.body);}
else{newMod.render();}}