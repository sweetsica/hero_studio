<div class="my-2">
    @for($i = 0; $i < $highestProductRankingMember->count(); $i++)
        <div class="d-flex border-top py-2">
            <div class="col-1 text-center align-self-center">
                #{{$i + 1}}
            </div>
            <div class="col-2 px-1">
                @if($highestProductRankingMember[$i]->avatar)
                    <img src="/storage/{{$highestProductRankingMember[$i]->avatar}}"
                         width="100" height="100">
                @endif
            </div>
            <div class="col-3">
                <div class="flex-grow-1">
                    <h5>
                        <a href="{{route('member.analytics', $highestProductRankingMember[$i]->id)}}">{{ $highestProductRankingMember[$i]->name }}</a>
                    </h5>
                </div>
                <div class="flex-grow-1">
                    <h6>{{ isset($highestProductRankingMember[$i]->departments[0]) ? $highestProductRankingMember[$i]->departments[0]->name : '' }}</h6>
                </div>

            </div>
            <div class="col-6 px-2 text-end">
                @if($sortBy === 'last_month_tasks_avg_product_rate')
                {{number_format($highestProductRankingMember[$i]->last_month_tasks_avg_product_rate, 1)}}
                <i style="color: orange"
                   class="bi bi-star-fill"
                ></i>
                @elseif($sortBy === 'last_month_tasks_count')
                Tổng số task : {{number_format($highestProductRankingMember[$i]->last_month_tasks_count)}}
                @elseif($sortBy === 'last_month_tasks_total_length')
                Tổng thời gian : {{number_format($highestProductRankingMember[$i]->last_month_tasks_total_length)}}
                @endif
                <div class="row">
                    <div>Đã hoàn thành
                        <span>{{ $highestProductRankingMember[$i]->last_month_done_tasks_count }} yêu cầu</span>
                    </div>
                </div>
            </div>
        </div>
    @endfor
</div>
