<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('img/mail.jpg') }}" class="logo" alt="mail Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
