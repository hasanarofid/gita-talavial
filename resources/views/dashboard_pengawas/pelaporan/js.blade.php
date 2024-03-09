@section('script')


<script src="{{ asset('theme/assets/js/modal-edit-user.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
  $(document).ready(function () {

   //   alert(3);
    var table = $('#dataTable').DataTable({
     
        processing: true,
        serverSide: true,
        ajax: "{{ route('pengawas.pelaporan.getdata') }}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'tahun_ajaran', name: 'tahun_ajaran'},
            {data: 'nama_program_kerja', name: 'nama_program_kerja'},
            {data: 'judul', name: 'judul'},
            {data: 'nama_kategori', name: 'nama_kategori'},
            {data: 'nama_sekolah', name: 'nama_sekolah'},
            {data: 'tenggat_waktu', name: 'tenggat_waktu'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    

  });




(function () {


  // Full Toolbar
  // --------------------------------------------------------------------
  const fullToolbar = [
    [
      {
        font: []
      },
      {
        size: []
      }
    ],
    ['bold', 'italic', 'underline', 'strike'],
    [
      {
        color: []
      },
      {
        background: []
      }
    ],
    [
      {
        script: 'super'
      },
      {
        script: 'sub'
      }
    ],
    [
      {
        header: '1'
      },
      {
        header: '2'
      },
      'blockquote',
      'code-block'
    ],
    [
      {
        list: 'ordered'
      },
      {
        list: 'bullet'
      },
      {
        indent: '-1'
      },
      {
        indent: '+1'
      }
    ],
    [{ direction: 'rtl' }],
    ['link', 'image', 'video', 'formula'],
    ['clean']
  ];

  // Full Toolbar2
  // --------------------------------------------------------------------
  const fullToolbar2 = [
    [
      {
        font: []
      },
      {
        size: []
      }
    ],
    ['bold', 'italic', 'underline', 'strike'],
    [
      {
        color: []
      },
      {
        background: []
      }
    ],
    [
      {
        script: 'super'
      },
      {
        script: 'sub'
      }
    ],
    [
      {
        header: '1'
      },
      {
        header: '2'
      },
      'blockquote',
      'code-block'
    ],
    [
      {
        list: 'ordered'
      },
      {
        list: 'bullet'
      },
      {
        indent: '-1'
      },
      {
        indent: '+1'
      }
    ],
    [{ direction: 'rtl' }],
    ['link', 'image', 'video', 'formula'],
    ['clean']
  ];

  // Full Toolbar3
  // --------------------------------------------------------------------
  const fullToolbar3 = [
    [
      {
        font: []
      },
      {
        size: []
      }
    ],
    ['bold', 'italic', 'underline', 'strike'],
    [
      {
        color: []
      },
      {
        background: []
      }
    ],
    [
      {
        script: 'super'
      },
      {
        script: 'sub'
      }
    ],
    [
      {
        header: '1'
      },
      {
        header: '2'
      },
      'blockquote',
      'code-block'
    ],
    [
      {
        list: 'ordered'
      },
      {
        list: 'bullet'
      },
      {
        indent: '-1'
      },
      {
        indent: '+1'
      }
    ],
    [{ direction: 'rtl' }],
    ['link', 'image', 'video', 'formula'],
    ['clean']
  ];

  // Full Toolbar4
  // --------------------------------------------------------------------
  const fullToolbar4 = [
    [
      {
        font: []
      },
      {
        size: []
      }
    ],
    ['bold', 'italic', 'underline', 'strike'],
    [
      {
        color: []
      },
      {
        background: []
      }
    ],
    [
      {
        script: 'super'
      },
      {
        script: 'sub'
      }
    ],
    [
      {
        header: '1'
      },
      {
        header: '2'
      },
      'blockquote',
      'code-block'
    ],
    [
      {
        list: 'ordered'
      },
      {
        list: 'bullet'
      },
      {
        indent: '-1'
      },
      {
        indent: '+1'
      }
    ],
    [{ direction: 'rtl' }],
    ['link', 'image', 'video', 'formula'],
    ['clean']
  ];

  const deskripsi_permasalahan = new Quill('#deskripsi_permasalahan', {
        modules: {
            toolbar: fullToolbar
        },
        placeholder: 'Type Something...',
        theme: 'snow'
    });

    const uraian = new Quill('#uraian', {
        modules: {
            toolbar: fullToolbar2
        },
        placeholder: 'Type Something...',
        theme: 'snow'
    });

    const catatan_evaluasi = new Quill('#catatan_evaluasi', {
        modules: {
            toolbar: fullToolbar3
        },
        placeholder: 'Type Something...',
        theme: 'snow'
    });

    const saran_rekomendasi = new Quill('#saran_rekomendasi', {
        modules: {
            toolbar: fullToolbar4
        },
        placeholder: 'Type Something...',
        theme: 'snow'
    });

    // Listen for 'ready' event for each editor
    deskripsi_permasalahan.on('editor:ready', function () {
        // Form submission logic here
        document.getElementById('add_laporan').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get the CSRF token value from the meta tag
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Update the hidden textareas with Quill editor content
            const hiddenTextarea1 = document.querySelector('textarea[name="deskripsi_permasalahan_hidden"]');
            hiddenTextarea1.value = deskripsi_permasalahan.root.innerHTML;

            const hiddenTextarea2 = document.querySelector('textarea[name="uraian_hidden"]');
        hiddenTextarea2.value = uraian.root.innerHTML;

        const hiddenTextarea3 = document.querySelector('textarea[name="catatan_hidden"]');
        hiddenTextarea3.value = catatan_evaluasi.root.innerHTML;

        const hiddenTextarea4 = document.querySelector('textarea[name="saran_hidden"]');
        hiddenTextarea4.value = saran_rekomendasi.root.innerHTML;
            console.log("hiddenTextarea1 "+hiddenTextarea1);
            console.log("hiddenTextarea2 "+hiddenTextarea2);
            console.log("hiddenTextarea3 "+hiddenTextarea3);
            console.log("hiddenTextarea4 "+hiddenTextarea4);

            // Serialize form data
            let formData = new FormData(this);

            // Add CSRF token to form data
            formData.append('_token', csrfToken);
            formData.append('deskripsi_permasalahan_hidden', hiddenTextarea1.value);
            formData.append('uraian_hidden', hiddenTextarea2.value);
            formData.append('catatan_hidden', hiddenTextarea3.value);
            formData.append('saran_hidden', hiddenTextarea4.value);
            console.log("formData  "+formData);
            // AJAX request
            // fetch(this.action, {
            //     method: 'POST',
            //     headers: {
            //         'X-CSRF-TOKEN': csrfToken,
            //     },
            //     body: formData
            // })
            // .then(response => response.json())
            // .then(data => {
            //     // Handle response
            //     console.log(data);
            // })
            // .catch(error => {
            //     console.error('Error:', error);
            // });
        });
    });
})();

</script>

@endsection