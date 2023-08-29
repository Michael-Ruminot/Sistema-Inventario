let dataTable;
let dataTableInitialized=false;

const initDataTable=async()=>{
    if(dataTableInitialized){
        dataTable.destroy();
    }

    dataTable=$("#tabla").dataTable({});

    dataTableInitialized =  true;
    
};

window.addEventListener("load", async () =>{
    await initDataTable();
});

