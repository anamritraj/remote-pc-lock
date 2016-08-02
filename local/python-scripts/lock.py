import ctypes
import sys
import json

def lock_computer():
    """
    This function calls the LockWorkStation function defined in the windll.user32 library
    :return: boolean
    """
    try:
        ctypes.windll.user32.LockWorkStation()
        return json.dumps(True);
    except:
        return json.dumps(False);

def main():
    print(lock_computer())
    

if __name__ == '__main__':
    main()