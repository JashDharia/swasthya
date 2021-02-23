//0-60 f, 61-70-d,71-80-c,81-90-b,91-100-a
//21:48
import java.io.*;

class grades{
	public static void main(String[] args){
		student s= new student();
		s.getdata();
		s.grade();
	}
}

class student{
	int grades;
	void getdata()throws IOException {
		BufferedReader bf= new BufferedReader(new InputStreamReader(System.in));
		grades=Integer.parseInt(bf.readLine());
	}
	void grade(){
		if(grades<=60){
			System.out.println("f");
		}
		else if(grades<=70){
			System.out.println("d");
		}
		else if(grades<=80){
			System.out.println("c");
		}
		else if(grades<=90){
			System.out.println("b");
		}
		else{
			System.out.println("a");
		}
	}
}