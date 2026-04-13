import './bootstrap';
import Swal from 'sweetalert2';

import $ from 'jquery'

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



function loadAllData(){
  $.ajax({
    url: '/service-ticket/api',
    method: 'GET',
    success: function(res) {

      console.log(res)

      let html = "";
      if( res.data.length == 0 ){
        html += `<tr>
                  <td colspan="8" class="text-center p-10">No data found</td>
                </tr>`
        }else{
          res.data.forEach((item, index) => {
            html += `
              <tr>
                <tr class="border-b border-gray-100 hover:bg-gray-50">
                  <td class="px-3 py-2 space-x-1.5">
                      <button data-id="`+item.id+`" data-action="change-status"
                        class="px-2 py-1 rounded-lg `+(item.is_active ? "bg-green-100 hover:bg-green-200" : "bg-red-100 hover:bg-red-200")+` text-xs">
                          `+(item.is_active ? "<i class='fa fa-check'></i>" : "<i class='fa fa-close'></i>")+`
                        </button>
                      <button data-modal-target="#editServicesTicketModal" data-id="`+item.id+`" data-action="edit"
                          class="px-2 py-1 rounded-lg bg-blue-100 text-xs hover:bg-blue-200"><i class='fa fa-pencil'></i></button>
                      <button type="button" data-action="delete" data-id="`+item.id+`"
                          class="px-2 py-1 rounded-lg bg-red-50 text-xs text-red-700 hover:bg-red-100"><i class='fa fa-trash'></i></button>
                  </td>
                  <td class="px-3 py-2">`+item.formatted_wo_date+`</td>
                  <td class="px-3 py-2 font-medium text-black">`+item.branch+`</td>
                  <td class="px-3 py-2">`+item.no_wo_client+`</td>
                  <td class="px-3 py-2">`+item.type_wo+`</td>
                  <td class="px-3 py-2">`+item.client+`</td>
                  <td class="px-3 py-2">`+(item.is_active ? "Active" : "Not Active")+`</td>
                  <td class="px-3 py-2">`+item.teknisi+`</td>
              </tr>
          `});
        }
      $('#services-ticket-data').html(html);
    },
    error: function(err) {
      Swal.fire(
        'Something went wrong',
        'Please refresh the page',
        'error'
      )
    }
  });
}

function clearForm(){
  $('#date-wo').val("");
  $('#branch').val("");
  $('#no-wo-client').val("");
  $('#type-wo').val("");
  $('#client').val("");
  $('#toggle-active').val("off");
  $('#teknisi').val("");
}

$(function () {

  loadAllData()

  $(document).on("click", '[data-action="save"]', function(){
    const isActive = $('#toggle-active').val() == "on" ? 1 : 0;
    
    $.ajax({
      url: '/service-ticket/api',
      method: 'POST',
      data: {
        date_wo: $('#date-wo').val(),
        branch: $('#branch').val(),
        no_wo_client: $('#no-wo-client').val(),
        type_wo: $('#type-wo').val(),
        client: $('#client').val(),
        is_active: isActive,
        teknisi: $('#teknisi').val()
      },
      success: function(data) {
        Swal.fire(
          'Data Saved',
          'New services ticket has been added!',
          'success'
        ).then((result) => {
          $("#close-add-modal").click();
          loadAllData()
          clearForm()
        })
      },
      error: function(err) {
        if (err.status === 422) {
          Swal.fire(
            'You Missed Something',
            'Please fill all the required fields',
            'error'
          )
        }
      }
    })
  });
  
  $(document).on("click", '[data-action="delete"]', function(){
    const id = $(this).data('id');

    Swal.fire({
      title: 'Remove service ticket?',
      text: "This is a permanent action!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

      if(!result.isConfirmed) return;

      $.ajax({
        url: '/service-ticket/api/' + id,
        method: 'DELETE',
        success: function(data) {
          Swal.fire(
            'Deleted',
            'Service ticket has been deleted.',
            'success'
          )
          loadAllData();
        }
      })
    })

  })

  $(document).on("click", '[data-action="edit"]', function(){
    const id = $(this).data('id');
    $.ajax({
      url: '/service-ticket/api/' + id,
      method: 'GET',
      success: function(res) {
        $('[data-action="update"]').data('id', res.data.id);
        $('#edit-date-wo').val(res.data.date_wo);
        $('#edit-branch').val(res.data.branch);
        $('#edit-no-wo-client').val(res.data.no_wo_client);
        $('#edit-type-wo').val(res.data.type_wo);
        $('#edit-client').val(res.data.client);
        $('#edit-toggle-active').val(res.data.is_active);
        $('#edit-teknisi').val(res.data.teknisi);
        openModal("#editServicesTicketModal");
      }
    })
  });

  $(document).on("click", '[data-action="update"]', function(){
    const id = $(this).data('id');
    const isActive = $('#edit-toggle-active').val() == "on" ? 1 : 0;

    $.ajax({
      url: '/service-ticket/api/' + id,
      method: 'PUT',
      data: {
        date_wo: $('#edit-date-wo').val(),
        branch: $('#edit-branch').val(),
        no_wo_client: $('#edit-no-wo-client').val(),
        type_wo: $('#edit-type-wo').val(),
        client: $('#edit-client').val(),
        is_active: isActive,
        teknisi: $('#edit-teknisi').val()
      },
      success: function(data) {
        // closeModal("#editServicesTicketModal");
        loadAllData();
        Swal.fire(
          'Data Updated',
          'Services ticket has been updated!',
          'success'
        )
        $("#close-edit-modal").click();
      }
    })
  });

  $(document).on("click", "[data-action='change-status']", function(){
    const id = $(this).data('id');

    Swal.fire({
      title: 'Change status?',
      text: "This is a permanent action!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, change it!'
    }).then((result) => {

      if(!result.isConfirmed) return;
      $.ajax({
        url: '/service-ticket/api/change-status/'+id,
        method: 'PUT',
        success: function(data) {
          loadAllData();
          Swal.fire(
            'Changed',
            'Status has been changed.',
            'success'
          )
        }
      })
    })
  });

    // ======================
    // Sidebar
    // ======================
    const $sidebar = $('#sidebar');
    const $sidebarToggle = $('#sidebarToggle');
    const $sidebarClose = $('#sidebarClose');
    const $sidebarBackdrop = $('#sidebarBackdrop');

    function openSidebar() {
        $sidebar.removeClass('-translate-x-full').addClass('translate-x-0');
        $sidebarBackdrop.removeClass('hidden').css('opacity', 1);
    }

    function closeSidebar() {
        $sidebar.addClass('-translate-x-full').removeClass('translate-x-0');
        $sidebarBackdrop.addClass('hidden').css('opacity', 0);
    }

    $sidebarToggle.on('click', openSidebar);
    $sidebarClose.on('click', closeSidebar);
    $sidebarBackdrop.on('click', closeSidebar);


    // ======================
    // Submenu
    // ======================
    $(document).on('click', '[data-submenu-toggle]', function () {
        const target = $(this).data('submenu-toggle');
        const $target = $(target);
        const $arrow = $(this).find('[data-submenu-arrow]');

        $target.toggleClass('hidden');
        $arrow.toggleClass('rotate-180');
    });


    // ======================
    // Modal
    // ======================
    function openModal($modal) {
        const $panel = $modal.find('[data-modal-panel]');

        $modal.removeClass('opacity-0 pointer-events-none');

        if ($panel.length) {
            $panel.removeClass('scale-95').addClass('scale-100');
        }
    }

    function closeModal($modal) {
        const $panel = $modal.find('[data-modal-panel]');

        $modal.addClass('opacity-0 pointer-events-none');

        if ($panel.length) {
            $panel.removeClass('scale-100').addClass('scale-95');
        }
    }

    // Event delegation
    $(document).on('click', function (e) {

        // 1) Open modal
        const $openBtn = $(e.target).closest('[data-modal-target]');
        if ($openBtn.length) {
            const selector = $openBtn.data('modal-target');
            const $modal = $(selector);

            if ($modal.length) openModal($modal);
            return;
        }

        // 2) Close modal (button)
        const $closeBtn = $(e.target).closest('[data-modal-dismiss]');
        if ($closeBtn.length) {
            const $modal = $closeBtn.closest('[data-modal]');

            if ($modal.length) closeModal($modal);
            return;
        }

        // 3) Click backdrop
        if ($(e.target).is('[data-modal]')) {
            closeModal($(e.target));
            return;
        }
    });
});