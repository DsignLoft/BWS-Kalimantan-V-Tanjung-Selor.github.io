    <!-- upload -->
    @if ($template->template_category != 17)
        <div class="file-upload">
            <ul class="nav nav-pills">
                @foreach ($layouts as $idl => $layout)
                    <li>
                        <input type="file" name="design_img[]" id="file-{{ $idl }}" class="inputfile inputfile-3" data-design="{{ $idl }}" accept=".pdf,.jpg,.png,.tif,.jpeg,.zip,.rar" hidden required>
                        @if (count($layouts) == 1)
                            <label for="file-{{ $idl }}" class="nav-item2 tmbl-up mb-0"> <span> Upload Design</span></label>
                        @else
                            <label for="file-{{ $idl }}" class="nav-item2 tmbl-up mb-0"> <span> Upload Design {{ $idl + 1 }}</span></label>
                        @endif
                    </li>
                @endforeach
                <li hidden><a class="nav-item2 nav-link active" href="#image-page" data-toggle="tab" id="image">Upload Design</a></li>
                <li><a class="nav-item2 nav-link mb-0" href="#link-page" data-toggle="tab" id="link">Link Design</a></li>
                @if ($template->template_category == 153)
                    <li><a class="nav-item2 nav-link mb-0" id="design-online">Design Online</a></li>
                @endif
            </ul>
        </div>
        <div class="tab-content">
            <!-- IMAGE  -->
            <div class="active tab-pane" id="image-page">
                <table class="table table-bordered mw-100 bg-white">
                    <tr>
                        @foreach ($layouts as $layout)
                            <td class="p-2 bg-white @error('design_img') border-danger @enderror">
                                @error('design_img')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center;">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                @enderror
                                <input type="hidden" name="layout[]" value="{{ $layout }}">
                                <div class="text-center mw-100">
                                    <div class="text-file" id="text-file{{ $loop->index }}"><span></span></div>
                                    <img src="" alt="" id="upload-preview{{ $loop->index }}" class="img-upload mw-50">
                                    <canvas id="pdfViewer{{ $loop->index }}"></canvas>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                </table>
            </div>
            <!-- LINK  -->
            <div class="form-group row tab-pane pl-3 mb-2" id="link-page">
                <x-input type="text" name="link" value="{{ old('link') }}" id="link-design" />
                <small style="color:red;">Mohon pastikan link design bisa diakses oleh kami.</small>
            </div>
        </div>
    @endif

    <script type="text/javascript">
        if (localStorage.getItem('url') != null){
            localStorage.removeItem('url');
        }
        $('#design-online').click(function(){
            function maketextnumber(n) {
                for (var r = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n",
                        "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F",
                        "G", "H", "I",  "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W",
                        "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
                         e = n, t = new Array, a = 0; a <= e - 1; a++) {
                    t[a] = r[parseInt(Math.random() * r.length)];
                    t = t;
                    randomtextnumber = t.join("")
                }
            }
            localStorage.setItem('url', window.location.href);
            window.location.href = "https://indoprinting.co.id/studio?"+maketextnumber(120)+randomtextnumber;
        });
        document.getElementById("link-design").value = localStorage.getItem('design');
        document.getElementById("link-design").innerHTML = localStorage.getItem('design');

        if (localStorage.getItem('design') != null){
            localStorage.removeItem('design');
        }

    </script>
