<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GakuensaiAnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcements')->insert([
            'title' => '学園祭について',
            'content' => '今年は例年通り、７月１６日、１７日に学園祭が開催されます。クラスで実行委員２名を決めなければなりません。明日には誰が実行委員をするのか決める予定ですので、よろしくお願いします。',
            'class_id' => 1,
            'created_at' => '2022-5-26',
        ]);
        DB::table('announcements')->insert([
            'title' => '学園祭について',
            'content' => '今年は例年通り、７月１６日、１７日に学園祭が開催されます。クラスで実行委員２名を決めなければなりません。明日には誰が実行委員をするのか決める予定ですので、よろしくお願いします。',
            'class_id' => 2,
            'created_at' => '2022-5-26',
        ]);
        DB::table('announcements')->insert([
            'title' => 'いよいよ夏休みです',
            'content' => '来週から夏季休暇に突入します。１ヶ月ほどの期間がありますが、生活習慣を乱すことなく健康に過ごして下さい。',
            'class_id' => 1,
            'created_at' => '2022-7-18',
        ]);
        DB::table('announcements')->insert([
            'title' => 'いよいよ夏休みです',
            'content' => '来週から夏季休暇に突入します。１ヶ月ほどの期間がありますが、生活習慣を乱すことなく健康に過ごして下さい。',
            'class_id' => 2,
            'created_at' => '2022-7-18',
        ]);
        DB::table('announcements')->insert([
            'title' => '前期試験テストについて',
            'content' => '皆さん夏休みも終盤ですが、いかがお過ごしでしょうか。本題の前期試験テストについてですが、予定通り、9/5から実施します。不合格にはならないようにテスト勉強を頑張って下さい！',
            'class_id' => 1,
            'created_at' => '2022-8-15',
        ]);
        DB::table('announcements')->insert([
            'title' => '前期試験テストについて',
            'content' => '皆さん夏休みも終盤ですが、いかがお過ごしでしょうか。本題の前期試験テストについてですが、予定通り、9/5から実施します。不合格にはならないようにテスト勉強を頑張って下さい！',
            'class_id' => 2,
            'created_at' => '2022-8-15',
        ]);
        DB::table('announcements')->insert([
            'title' => '進級おめでとうございます',
            'content' => '皆さん、こんにちは。今年も担任をさせていただくことになった先生 太郎１です。いよいよ就職先を決める年となりました。皆さんが満足のいく結果となるよう精一杯、サポートします。よろしくお願いします。',
            'class_id' => 1,
            'created_at' => '2022-4-6',
        ]);
        DB::table('announcements')->insert([
            'title' => '前期試験テストについて',
            'content' => '皆さん、こんにちは。今年も担任をさせていただくことになった先生 太郎１です。ぼちぼち、就職活動を始める年になりました。夏などは積極的にインターンに参加して、企業にアピールしましょう。では、よろしくお願いします。',
            'class_id' => 2,
            'created_at' => '2022-4-6',
        ]);
        DB::table('announcements')->insert([
            'title' => '国家試験、お疲れさまです',
            'content' => '昨日の国家試験、お疲れさまです。手応えを感じた人もそうでなった人もいるかと思いますが、引きずらないように切り替えていきましょう。また、結果については分かり次第、報告をお願いします。',
            'class_id' => 1,
            'created_at' => '2022-4-18',
        ]);
        DB::table('announcements')->insert([
            'title' => '国家試験、お疲れさまです',
            'content' => '昨日の国家試験、お疲れさまです。手応えを感じた人もそうでなった人もいるかと思いますが、引きずらないように切り替えていきましょう。また、結果については分かり次第、報告をお願いします。',
            'class_id' => 2,
            'created_at' => '2022-4-18',
        ]);
        DB::table('announcements')->insert([
            'title' => '奨学金について',
            'content' => '来週の月曜日に必要な人は奨学金の申請を行ってもらいます。印鑑と筆記用具の準備をお願いします。',
            'class_id' => 1,
            'created_at' => '2022-4-25',
        ]);
        DB::table('announcements')->insert([
            'title' => '奨学金について',
            'content' => '来週の月曜日に必要な人は奨学金の申請を行ってもらいます。印鑑と筆記用具の準備をお願いします。',
            'class_id' => 2,
            'created_at' => '2022-4-25',
        ]);
        DB::table('announcements')->insert([
            'title' => 'AWSのアカウントについて',
            'content' => 'とある生徒からAWSを使いたいという要望があり、皆さんにアカウントを配布することが決まりました。サインインに必要なメールアドレスやパスワードについてはメールで後ほどお送りします。ぜひ、有意義に使って下さい。',
            'class_id' => 1,
            'created_at' => '2022-5-13',
        ]);
        DB::table('announcements')->insert([
            'title' => 'AWSのアカウントについて',
            'content' => 'とある生徒からAWSを使いたいという要望があり、皆さんにアカウントを配布することが決まりました。サインインに使用する、メールアドレスやパスワードについてはメールで後ほどお送りします。ぜひ、有意義に使って下さい。',
            'class_id' => 2,
            'created_at' => '2022-5-13',
        ]);
    }
}
