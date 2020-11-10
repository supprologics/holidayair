@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
@endsection

@section('content') 
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-description">

                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title page-title">Images for {{$tour->name}}</h2>
                            <div class="nk-block-des text-soft">
                            </div>
                        </div>
                        
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#file-upload" class="btn btn-primary" data-toggle="modal"><em class="icon ni ni-upload-cloud"></em> <span>Upload</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                
                    </div><!-- .nk-block-head -->
                </div><!-- .nk-block-head -->
                    
                @include('partials.error')


                <div class="nk-block" >
                
                <div class="panel-body card-group" id="uploaded_image">
                    <!-- Card group -->


  


                </div>
                </div><!-- .nk-block -->

                <div class="nk-block">
                    <ul class="nk-block-tools g-3">
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('sethints' ,$tour->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Previous</span>
                            </a>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('route.index',$tour->id) }}" class="btn btn-primary">
                                <em class="icon ni ni-arrow-right"></em>
                                <span>Next</span>
                            </a>
                        </li>
                    </ul>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

    <!-- @@ File Upload Modal  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="file-upload">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <div class="nk-upload-form">
                        <h5 class="title mb-3">Upload Images</h5>

                        <form id="dropzoneForm" class="dropzone small bg-lighter" action="{{ route('dropzone.upload') }}">
                            @csrf
                            <div class="dz-message" data-dz-message>
                                <span class="dz-message-text"><span>Drag and drop</span> file here or <span>browse</span></span>
                            </div>
                            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                          </form>
                    </div>
                    <div class="nk-modal-action justify-end">
                        <ul class="btn-toolbar g-4 align-center">
                            <li><a data-dismiss="modal" class="link link-primary">Cancel</a></li>
                            <li><button type="button"  id="submit-all" class="btn btn-primary">Add Files</button></li>
                        </ul>
                    </div>
                    
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->


@endsection

@section('script')
    <script src="{{ asset('admin-assets/js/apps/file-manager.js?ver=2.0.0')}}"></script>

    <script type="text/javascript">
    var tour_id = "{{ $tour->id }}";
   
        Dropzone.options.dropzoneForm = {
            autoProcessQueue : false,
            parallelUploads:5,
            acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
      
          init:function(){
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;
      
            submitButton.addEventListener('click', function(){
              myDropzone.processQueue();
            });
      
            this.on("complete", function(){
              if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
              {
                var _this = this;
                _this.removeAllFiles();
              }
              load_images();
            });
      
          }
      
        };
      
        load_images();

        function load_images()
        {
          $.ajax({
            url:"{{ route('dropzone.fetch') }}",
            data:{
                'tour_id':tour_id,
            },
            success:function(data)
            {
              $('#uploaded_image').html(data);
            }
          })
        }
      
        $(document).on('click', '.remove_image', function(){
          var name = $(this).attr('id');
          console.log(name);
          $.ajax({
            url:"{{ route('dropzone.delete') }}",
            data:{name : name},
            success:function(data){
              load_images();
            }
          })
        });
      
      </script>
@endsection