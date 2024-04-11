use Banking;
Delimiter //
drop procedure if exists fibonacci;
create procedure fibonacci()
begin
declare f,f1,f2,c int;
    declare res varchar(255);
    set c=0;
    set f=0;
    set f1=1;
    set res=concat(f,' , ',f1);
    while c<8 do
set f2=f+f1;
set res= concat(res,' , ',f2);
set f=f1;
set f1=f2;
        set c=c+1;
end while;
    select res as fibonacci_series;
end //
Delimiter ;
call fibonacci();
