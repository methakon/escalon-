if(typeof this.NodeList.prototype.forEach != undefined )
{
    this.NodeList.prototype.forEach = Array.prototype.forEach;
}

class mapd{
    constructor() { 
         this.auther="SWARNA SEKHAR DHAR";
         this.b_lables=[];
         this.b_values=[];
         document.char=this;
         this.initialise();
     }
     initialise()
     {
        // The location of Uluru
        

     }
 
    
}

class dtables{
    constructor() { 
         this.auther="SWARNA SEKHAR DHAR";
         this.base_url=base_url;
         this.table=document.getElementById("RrgistrationsTable");;
         document.dtbl=this;
         this.initialise();
     }
     initialise()
     {
          
          
            
         var table =  $(document.dtbl.table).DataTable( {
           "ajax": document.dtbl.base_url+'/admin/get_list',
           orderCellsTop: true,
           fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                 
            ]
          });
     }
     
}

 

 