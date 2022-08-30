@extends('panel.layout.main')
@section('title' , 'سابقه تراکنش ها')
@section('content')
    <div class="card  flex-lg-column flex-md-row ">
        <div class="table-responsive">
            <table class="table display mb-4 table-responsive-xl card-table no-footer">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>اعتبار</th>
                    <th>مبلغ</th>
                    <th>وضعیت</th>
                    <th>شماره پیگیری</th>
                    <th>تاریخ</th>
                </tr>
                </thead>
                <tbody>
                @forelse($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->tire->name }}</td>
                        <td>{{ $transaction->tire->expire }} روز</td>
                        <td>
                            @if( $transaction->amount == 0 )
                                رایگان !
                            @else
                                {{ number_format($transaction->amount) }} تومان
                            @endif
                        </td>
                        <td>
                            @if ( $transaction->result == null and ! $transaction->is_pay )
                                <span class="badge badge-warning">در انتظار</span>
                            @elseif ( $transaction->result != null and ! $transaction->is_pay )
                                <span class="badge badge-danger">نا موفق</span>
                            @elseif ( $transaction->is_pay )
                                <span class="badge badge-success">موفق</span>
                            @endif
                        </td>
                        <td>#{{ $transaction->id }}</td>
                        <td>{{ $transaction->created_at->toJalali()->formatJalaliDatetime() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-info w-100 text-center">
                                تراکنشی یافت نشد!
                            </div>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            @if($transactions->hasPages())
                <div class="row"></div>
                <div class="float-left ml-5">
                    {!! $transactions->links("pagination::bootstrap-4") !!}
                </div>
            @endif
        </div>
    </div>
@endsection
