@extends('tabler.base-main-index')
@section('custom-css')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="calendar-default"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('dashboard') }}/libs/fullcalendar/index.global.min.js?1747482943" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var calendarEl = document.getElementById("calendar-default");
        var currentYear = new Date().getFullYear();
        var currentMonth = new Date().getMonth();
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: "dayGridMonth",
          events: [
            {
              title: "Offsite Retreat",
              start: new Date(currentYear, currentMonth, 2, 9, 0),
              end: new Date(currentYear, currentMonth, 4, 17, 0),
              color: "var(--tblr-red)",
              backgroundColor: "var(--tblr-red-lt)",
              borderColor: "var(--tblr-red-200)",
            },
            {
              title: "Monthly Planning",
              start: new Date(currentYear, currentMonth, 1, 10, 0),
              end: new Date(currentYear, currentMonth, 1, 11, 30),
            },
            {
              title: "Marketing Strategy Call",
              start: new Date(currentYear, currentMonth, 4, 14, 0),
              end: new Date(currentYear, currentMonth, 4, 15, 0),
            },
            {
              title: "Design Sprint",
              start: new Date(currentYear, currentMonth, 7, 9, 0),
              end: new Date(currentYear, currentMonth, 7, 12, 0),
            },
            {
              title: "Dev Team Check-in",
              start: new Date(currentYear, currentMonth, 10, 11, 0),
              end: new Date(currentYear, currentMonth, 10, 11, 30),
            },
            {
              title: "Customer Feedback Review",
              start: new Date(currentYear, currentMonth, 13, 13, 0),
              end: new Date(currentYear, currentMonth, 13, 14, 0),
            },
            {
              title: "Mid-Month Review",
              start: new Date(currentYear, currentMonth, 15, 10, 30),
              end: new Date(currentYear, currentMonth, 15, 11, 30),
            },
            {
              title: "Webinar: Product Update",
              start: new Date(currentYear, currentMonth, 18, 16, 0),
              end: new Date(currentYear, currentMonth, 18, 17, 0),
            },
            {
              title: "Sales Training",
              start: new Date(currentYear, currentMonth, 21, 9, 30),
              end: new Date(currentYear, currentMonth, 21, 11, 0),
            },
            {
              title: "Company All-Hands",
              start: new Date(currentYear, currentMonth, 25, 15, 0),
              end: new Date(currentYear, currentMonth, 25, 16, 0),
            },
            {
              title: "End-of-Month Wrap-up",
              start: new Date(currentYear, currentMonth, 31, 10, 0),
              end: new Date(currentYear, currentMonth, 31, 11, 0),
            },
          ],
        });
        calendar.render();
      });
</script>
@endsection 