#Resource where are the files
vars <- list.files(path="//ALLIANCEDFS.ALLIANCE.CGIAR.ORG/DATA17_CCAFS-Agroclimas/Agroclimas/data/ipcc_6ar_wcl_downscaled/", pattern = "ssp", full.names = TRUE)

#lapply to generate all the combinations
format <- lapply(1:length(vars), function(i){
  file<-vars[i]
  file
  file_name<-basename(file)
  cat(paste0(file_name,"\n"))
  
  periods <- list.files(path= paste0("//ALLIANCEDFS.ALLIANCE.CGIAR.ORG/DATA17_CCAFS-Agroclimas/Agroclimas/data/ipcc_6ar_wcl_downscaled/",file_name,"/"), full.names = TRUE)
  periods
  periods_fuc <- lapply(1:length(periods), function(j){
    filep<-periods[j]
    file_namep<-basename(filep)
    cat(paste0(file_namep,"\n"))
    models <- list.files(path= paste0("//ALLIANCEDFS.ALLIANCE.CGIAR.ORG/DATA17_CCAFS-Agroclimas/Agroclimas/data/ipcc_6ar_wcl_downscaled/",file_name,"/",file_namep,"/"), full.names = TRUE)
    models
    models_func <- lapply(1:length(models), function(k){
      filem<-models[k]
      file_namem<-basename(filem)
      cat(paste0(file_namem,"\n"))
      resolution <- list.files(path= paste0("//ALLIANCEDFS.ALLIANCE.CGIAR.ORG/DATA17_CCAFS-Agroclimas/Agroclimas/data/ipcc_6ar_wcl_downscaled/",file_name,"/",file_namep,"/", file_namem, "/"), full.names = TRUE)
      resolution
      resolution_func <- lapply(1:length(resolution), function(l){
        filer<-resolution[l]
        file_namer<-basename(filer)
        cat(paste0(file_namer,"\n"))
        files <- list.files(path= paste0("//ALLIANCEDFS.ALLIANCE.CGIAR.ORG/DATA17_CCAFS-Agroclimas/Agroclimas/data/ipcc_6ar_wcl_downscaled/",file_name,"/",file_namep,"/", file_namem, "/", file_namer, "/"), full.names = TRUE)
        files
        files_func <- lapply(1:length(files), function(m){
          filef<-files[m]
          file_namef<-basename(filef)
          cat(paste0(file_namef,"\n"))
          name_spl<-strsplit(file_namef, file_namep)
          variable<-strsplit(name_spl[[1]][2], '_')
          local_url<- paste0("/data/ipcc_6ar_wcl_downscaled/",file_name,"/",file_namep,"/", file_namem, "/", file_namer, "/")
          df <- data.frame("name"=file_namef, "method_id"=1, "scenario_id" = file_name, "period_id" = file_namep, "model_id"=file_namem, 
                           "variable_id"=variable[[1]][2], "resolution_id"=file_namer, "format_id"=3, "file_set_id"=13, "extent_id"=1, "tile_id"=0, "loca_url"=local_url, "availability_status_id"=2)
          return(df)
        })
        fil <- do.call(rbind, files_func)
        return(fil)  
      })
      res <- do.call(rbind, resolution_func)
    return(res)  
    })
    mod <- do.call(rbind, models_func)
    return(mod)
  })
  per <- do.call(rbind, periods_fuc)
  return(per)
})
#Generating a csv file
table <- do.call(rbind,format)
write.csv(table,"//catalogue/workspace_cluster_2/SubsettingTool/Inputs/ccafs/ccafs_file.csv")

