<?php

namespace App\Http\Controllers;

use App\Models\id;
use Inertia\Inertia;    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $products = [
        ['id' => 1, 'name' => 'ผีถ้วยแก้ว The Haunted Glass', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือผู้เล่นจะมีคนที่ได้รับบทเป็นฆาตกรและผี โดยฆาตกรต้องพยายามอย่าให้โดนจับได้ ส่วนผีก็ต้องชี้ตัวฆาตกรให้ได้','price' => 300 , 
        'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/The-Haunted-Glass-PIC-00.jpg'],
        ['id' => 2, 'name' => 'Lotto ล้อตโต้', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือจะต้องเปิดการ์ดลอตเตอรี่ไว้ตรงกลาง 1 ใบ และผู้เล่นทุกคนจะต้องสับการ์ดในมือของตัวเองโดยที่คว่ำเอาไว้ เมื่อเปิดการ์ดในมือทุกคนต้องรีบเอาการ์ดที่ตรงกับเลขลอตเตอรี่ลงและตะครุบลอตเตอรี่ไว้ให้ได้ก่อนคนอื่น โดยสามารถมีการชาเลนจ์ได้ว่าลงเลขถูกหรือไม่', 'price' => 200, 
        'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Lotto-Board-game-PIC.jpg'],
        ['id' => 3, 'name' => 'Cat and the Tower', 'description' => 'ผู้เล่นจะต้องร่วมมือกันเพื่อต่อหอคอยให้สูงขึ้นไปเรื่อย ๆ โดยในระหว่างทางจะมีเพื่อน ๆ เหมียวของเจ้าแมวดำโผล่มาร่วมทางและช่วยสร้างความบาลานซ์ให้แก่หอคอยได้ เพียงแต่คุณต้องวางตำแหน่งเจ้าเหมียวเหล่านั้นให้ดี แล้วมาช่วยกันต่อหอคอยให้สูงเพื่อน้องแมวกันเถอะ!', 'price' => 250, 
        'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Cat-and-the-Tower-board-game-pic.jpg'],
       ['id' => 4, 'name' => 'Is It! Thai Dishes อีสส อิท ไทย ดิช', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือจะต้องทำการจับคู่การ์ดอาหารและการ์ดส่วนผสมให้ตรงกัน ในรอบแรกผู้เล่นจะต้องเปิดการ์ดอาหาร เพื่อจับคู่ส่วนผสมให้ตรง ถ้าไม่ใช่ก็ให้คว่ำการ์ดลง และผู้เล่นก็จะต้องเปิดการ์ดส่วนผสมใบต่อไป และหลังจากนี้จะเป็นการเข้าสู่สนามรบของจริง โดยผู้เล่นทุกคนจะต้องแย่งกันหาคำตอบให้ได้ไวที่สุด ถ้าทำได้ก็รับไปเลย 1 คะแนน แหม่ แค่ฟังกฎก็รู้สึกได้ถึงความวุ่นวายเลยทีเดียว!?', 'price' => 220, 
       'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Is-It-Thai-Dishes-Pic.jpg'],
       ['id' => 5, 'name' => 'I’m Stuck in the Lift ฉันติดอยู่ในลิฟท์', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือจะได้เล่นเป็นพนักงานส่งของที่ต้องขึ้นไปทำหน้าที่บนตึกสูง ซึ่งถ้าเราขึ้นไปส่งถูกชั้นก็จะได้รับคะแนน แต่ปัญหาคือเรามีลิฟต์ตัวเดียว แต่พนักงานส่งของมีหลายคนนี่สิ… และเมื่อทุกคนแย่งกันกดลิฟต์แบบนี้ สุดท้ายลิฟต์จะไปจอดที่ชั้นไหนกันนะ!?', 'price' => 200, 
       'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Im-Stuck-in-the-Lift-PIC-000.jpg'],
       ['id' => 6, 'name' => 'เกมเศรษฐี', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือต้องมี 1 คนทำหน้าที่เป็นนายธนาคารที่เปรียบได้เหมือนคนคุมเกม และทำการแจกเงินตั้งต้น พร้อมโฉนดที่ดินให้ผู้เล่นแต่ละคน เมื่อเริ่มเกมผู้เล่นจะสามารถทำการซื้อที่ดินในสถานที่ที่เดินไปตกได้ และถ้าผู้เล่นคนอื่นมาตกในที่ดินของเรา เราก็จะได้เงินค่าเช่าตามที่ระบุไว้ในโฉนด โดยจะผลัดกันเล่นคนละเทิร์นไปเรื่อย ๆ จนกว่าจะมีคนล้มละลาย หรือหมดตัว จนเหลือเพียงผู้เล่นคนเดียวที่เป็นผู้ชนะ', 'price' => 180, 
       'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Board-game-01.jpg'],
       ['id' => 7, 'name' => 'Zombicide (2nd Edition)', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือจะได้รับบทผู้รอดชีวิตที่ต้องช่วยกันทำภารกิจต่าง ๆ ให้สำเร็จ แต่ในขณะเดียวกันก็ต้องต่อสู้กับกองทัพซอมบี้ที่พยายามจะบุกเข้ามาโจมตีเราตลอดทั้งเกม', 'price' => 150, 
       'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Board-game-010.jpg'],
       ['id' => 8, 'name' => 'ยุทธพิชัยสามก๊ก', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือได้รับบทเป็นเหล่ายอดขุนพลในวรรณกรรมสามก๊ก ไม่ว่าจะเป็นเล่าปี่ โจโฉ หรือแม้กระทั่งสาวงามอย่างเตียวเสี้ยน ซึ่งระหว่างเล่นแต่ละคนจะพยายามหาพรรคพวกฝ่ายตนเอง และร่วมมือกันโค่นฝั่งตรงข้าม ไม่ว่าจะด้วยการโจมตีซึ่งหน้า วางกับดักกลอุบาย หรือแม้กระทั่งหักหลังกันเองในตอนจบ!', 'price' => 200, 
       'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Board-game-07.jpg  '],
       ['id' => 9, 'name' => 'ขบวนการปราบซอมบี้', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือให้ผู้เล่นแต่ละคนนำตัวละครของตัวเองไปวางไว้ในห้องสีแดง จากนั้นก็ทอยเต๋าซอมบี้เพื่อเปิดเกมว่าซอมบี้ตัวไหนจะบุกเข้าโรงเรียน และเลือกว่าจะเดิน อยู่กับที่ หรือจัดการซอมบี้ แล้วก็ผลัดกันเล่นกันไปตามลำดับ ซึ่งถ้าซอมบี้ถูกกำจัดซอมบี้ตัวนั้นก็จะเด้งออกจากกระดานกลับมารอบุกใหม่ แต่ถ้าห้องไหนมีซอมบี้ถึง 3 ตัว ผู้เล่นจะไม่สามารถเข้าห้องนั้นได้ และหากซอมบี้ทั้ง 8 ตัวบุกเข้ามาในโรงเรียนจนหมด ก็เท่ากับจบเกมเพราะผู้เล่นไม่สามารถปกป้องโรงเรียนไว้ได้!', 'price' => 250, 
       'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Board-game-04.jpg'],
       ['id' => 10, 'name' => 'เกมล่าปริศนามนุษย์หมาป่า', 'description' => 'วิธีการเล่นคร่าว ๆ ของเกมนี้คือจะต้องมี 1 คนทำหน้าที่เป็นผู้ดำเนินเกม และผู้เล่นคนแต่ละคนจะได้การ์ดบทบาทคนละหนึ่งใบ โดยที่แต่ละบทบาทก็จะมีหน้าที่และความสามารถที่แตกต่างกันออกไป ซึ่งแต่ละคนก็ต้องเก็บไว้เป็นความลับ
       หลังจากนั้นผู้ดำเนินเกมก็จะให้ทุกคนหลับตาเพื่อตรวจสอบบทบาทในคืนแรกโดยการเรียกมนุษย์หมาป่าให้ลืมตา และดูเพื่อนในทีมของตน แล้วหลับตาลง จากนั้นก็ทำการเรียกบทบาทอื่นขึ้นมาเรื่อย ๆ ผู้ดำเนินเกมจะคอยถามเหล่าผู้ที่มีความสามารถว่าจะใช้พลังหรือไม่ด้วยภาษามือ หรืออะไรก็ตามที่กำหนดกันไว้เพื่อสื่อสารโดยที่ไม่เปิดเผยตัวตน
       และเมื่อทุกคนได้ใช้ความสามารถของตัวเองครบแล้วจะให้ทุกคนลืมตา ซึ่งจะนับว่าเป็นช่วงกลางวันที่ทุกคนจะต้องปรึกษากันเพื่อหาตัวมนุษย์หมาป่า เมื่อสรุปได้ว่าจะโหวตใคร ผู้ดำเนินเกมจะทำการเปิดโหวต ใครที่ถูกโหวตมากที่สุดจะถูกไต่สวน ผู้เล่นคนนั้นสามารถแก้ต่างได้ภายในเวลาที่กำหนด และทุกคนจะทำการโหวตตกลงกันอีกครั้งหนึ่งว่าจะฆ่า หรือไม่ฆ่า เมื่อจบการพิพากษาจะวนกลับเข้าสู่กลางคืนอีกครั้ง เพียงแต่ว่าในค่ำคืนนี้เมื่อมนุษย์หมาป่าลืมตาขึ้นมาจะสามารถจะเลือกฆ่าคน 1 คน
       เกมจะดำเนินสลับกลางวันกลางคืนไปเรื่อย ๆ จนเมื่อฝ่ายมนุษย์หมาป่าทุกคนถูกฆ่า ฝ่ายชาวบ้านก็จะชนะ แต่ถ้าฝ่ายชาวบ้านและมนุษย์หมาป่าเท่ากันเมื่อไหร่ ผู้เล่นฝ่ายมนุษย์หมาป่าก็จะเป็นฝ่ายชนะไป', 'price' => 330, 
       'image' => 'https://www.online-station.net/wp-content/uploads/2023/06/Board-game-011.jpg'],
        ];  
    public function index()
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $product = collect($this->products)->firstWhere('id', $id);
    if (!$product) {
    abort(404, 'Product not found');
    }
    return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
